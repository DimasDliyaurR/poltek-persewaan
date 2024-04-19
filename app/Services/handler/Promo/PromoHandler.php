<?php

namespace App\Services\handler\Promo;

use App\Models\Promo;
use App\Repositories\Promo\PromoRepository;

class PromoHandler
{
    protected $promo;
    protected $promoModel;
    protected $promoCode;
    protected $category;

    public function __construct($promoCode, $category = null)
    {
        $this->promoCode = $promoCode;
        $this->category = $category;
        $this->_model();
    }

    public function isExpired(): bool
    {
        $timeExpired = strtotime($this->promo->p_kadaluarsa) - now();

        return ($timeExpired < 0);
    }

    public function isActive(): bool
    {
        return $this->promo->p_is_umum;
    }

    public function isExist(): bool
    {
        return count($this->promo) != 0;
    }

    public function isCategorySame(): bool
    {
        return $this->promo->p_kategori == $this->category;
    }

    public function isUserAlreadyUsing()
    {
        $numberOfUser = count($this->promo->user);

        return $numberOfUser != 0;
    }

    public function total($subTotal)
    {
        $tipe = $this->promo->p_tipe;

        if ($tipe == "fixed") {
            return $subTotal - $tipe->promo->p_isi;
        } else {
            return $subTotal * ($tipe->promo->p_isi / 100);
        }
    }

    public function decreaseStok()
    {
        return $this->promoModel::where("p_code", $this->promoCode)->update([
            "p_kapasitas" => $this->promo->p_kapasitas - 1
        ]);
    }

    public function _model(?Promo $promo = null)
    {
        $this->promoModel = $promo;
        $this->promo = $promo::with("user")->where("p_code", $this->promoCode)->first();
    }
}
