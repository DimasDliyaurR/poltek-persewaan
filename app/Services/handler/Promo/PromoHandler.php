<?php

namespace App\Services\handler\Promo;

use App\Models\Promo;

class PromoHandler
{
    protected $promo;
    protected $promoModel;
    protected $promoCode;
    protected $user_id;
    protected $category;

    public function __construct($promoCode, $category = null)
    {
        $this->promoCode = $promoCode;
        $this->category = $category;
        $this->user_id = auth()->user()->id;
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
        return $this->promo != null;
    }

    public function isCategorySame(): bool
    {
        return $this->promo->p_kategori == $this->category;
    }

    public function isAppliesForAllCategories(): bool
    {
        return $this->promo->p_kategori == "All";
    }

    public function isUserAlreadyUsing()
    {
        $numberOfUser = $this->promoModel::withCount("user", fn ($q) => $q->where("id", $this->user_id))->get();

        return $numberOfUser->user_count != 0;
    }

    public function getStok()
    {
        return $this->promo->p_kapasitas;
    }

    public function getPromo()
    {
        return $this->promo;
    }

    public function total($subTotal)
    {
        $tipe = $this->promo->p_tipe;

        return ($tipe == "fixed") ? $subTotal - $this->promo->p_isi : ($subTotal * ($this->promo->p_isi / 100));
    }

    public function decreaseStok()
    {
        return $this->promoModel::where("p_kode", $this->promoCode)->update([
            "p_kapasitas" => $this->promo->p_kapasitas - 1
        ]);
    }

    public function _model()
    {
        $this->promoModel = new Promo();
        $this->promo = $this->promoModel::with("user")->where("p_kode", $this->promoCode)->first();
    }
}
