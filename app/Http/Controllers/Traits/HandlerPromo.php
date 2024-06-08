<?php

namespace App\Http\Controllers\Traits;

use App\Services\handler\Promo\PromoHandler;
use Illuminate\Http\Request;


trait HandlerPromo
{
    // Inisiasi Promo
    private $promo;
    private $checkPromo = false;

    /**
     * Handler Promo
     * @param string $category
     * @param \Illuminate\Http\Request $request
     * @return int 3 Promo Pernah digunakan
     * @return int 2 Promo Tidak bisa digunakan
     * @return int 1 Promo Tidak Valid
     */
    public function handlerPromo(string $category)
    {
        $this->promo = new PromoHandler($this->inputPromo(), $category);
        // Cek Isi Promo
        if ($this->checkInputPromo()) {
            // Apakah promo ada dan sesuai kategori
            if ($this->promo->isExist() && ($this->promo->isCategorySame() or $this->promo->isAppliesForAllCategories())) {
                // Apakah Promo Tidak Kadaluarsa dan Aktif
                if ((!$this->promo->isExpired()) && $this->promo->isActive()) {
                    // Apakah Promo sudah digunakan oleh user
                    if ($this->promo->isUserAlreadyUsing()) {
                        return 3;
                    }
                    // Promo sudah terdeteksi
                    $this->checkPromo = true;
                } else {
                    return 2;
                }
            } else {
                return 1;
            }
        }
    }

    /**
     * 
     * @return bool
     */
    public function checkPromo($tarif = 0)
    {
        if ($this->checkPromo) {
            // Apakah Promo masih tersisa
            if ($this->promo->getStok() > 0 or $this->promo->isStokUnlimited()) {
                // Perhitungan Promo dengan Subtotal
                if ($tarif != 0) {
                    $this->total_transaksi = $this->promo->total($this->total_transaksi, $tarif);
                } else {
                    $this->total_transaksi = $this->promo->total($this->total_transaksi);
                }
                // Pengurangan Kapasitas Promo
                if (!$this->promo->isStokUnlimited()) {
                    $this->promo->decreaseStok();
                }

                $this->promo->addDetailUser();
            } else {
                return false;
            }
        }
    }

    public function checkInputPromo()
    {
        return $this->inputPromo() != null;
    }

    public function inputPromo()
    {
        return $this->inputPromo;
    }
}
