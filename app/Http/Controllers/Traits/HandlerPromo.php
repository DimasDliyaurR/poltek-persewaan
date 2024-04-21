<?php

namespace App\Http\Controllers\Traits;

use App\Services\handler\Promo\PromoHandler;
use Illuminate\Http\Request;


trait HandlerPromo
{
    // Inisiasi Promo
    private $promo;
    private $checkPromo = false;

    public function handlerPromo($category)
    {
        $this->promo = new PromoHandler($this->inputPromo(), $category);
        // Cek Isi Promo
        if ($this->checkInputPromo()) {
            // Apakah promo ada dan sesuai kategori
            if ($this->promo->isExist() && ($this->promo->isCategorySame() or $this->promo->isAppliesForAllCategories())) {
                // Apakah Promo Tidak Kadaluarsa dan Aktif
                if (!(!($this->promo->isExpired()) && $this->promo->isActive())) {
                    // Apakah Promo sudah digunakan oleh user
                    if ($this->promo->isUserAlreadyUsing()) {
                        return 3; // Promo sudah pernah digunakan
                    }
                    // Promo sudah terdeteksi
                    $this->checkPromo = true;
                } else {
                    return 2; // Promo Tidak bisa digunakan
                }
            } else {
                return 1; // Promo Tidak Valid
            }
        }
    }

    public function checkPromo()
    {
        if ($this->checkPromo) {
            // Apakah Promo masih tersisa
            if ($this->promo->getStok() > 0) {
                // Perhitungan Promo dengan Subtotal
                $this->total_transaksi = $this->promo->total($this->total_transaksi);
                // Pengurangan Kapasitas Promo
                $this->promo->decreaseStok();
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
