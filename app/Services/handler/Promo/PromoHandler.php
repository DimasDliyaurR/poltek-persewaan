<?php

namespace App\Services\handler\Promo;

use App\Models\Promo;
use App\Models\DetailUserPromo;
use App\Services\Promo\PromoService;

class PromoHandler
{
    /**
     * data pertama
     * @var object $promo
     */
    protected $promo;

    /**
     * Object Model Promo
     * @var object $promoQuery
     */
    protected $promoQuery;

    /**
     * Object Model Detail User Promo
     * @var object $detailUserPromo
     */
    protected $detailUserPromo;

    /**
     * Code Promo
     * @var string $promoCode
     */
    protected $promoCode;

    /**
     * id user terkini
     * @var int $user_id 
     */
    protected $user_id;

    /**
     * Kategori
     * @var string $category
     */
    protected $category;

    /**
     * @param string $promoCode Code Promo
     * @param string|null $category Kategori untuk memeriksa promo
     */
    public function __construct($promoCode, $category, $withoutUser = false)
    {
        $this->promoCode = $promoCode;
        $this->category = $category;
        $this->user_id = !$withoutUser ? auth()->user()->id : null;
        $this->_model();
    }

    public function isExpired(): bool
    {
        $timeExpired = strtotime($this->promo->p_kadaluarsa) - strtotime(now());
        return ($timeExpired < 0);
    }

    public function isActive(): bool
    {
        return $this->promo->p_is_aktif && strtotime($this->promo->p_mulai) < strtotime(now());
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
        $numberOfUser = $this->promoQuery::withCount(["user" => fn ($q) => $q->where("users.id", $this->user_id)])->where("p_kode", $this->promoCode)->first();

        return $numberOfUser->user_count != 0;
    }

    public function getStok()
    {
        return $this->promo->p_jumlah;
    }

    public function isStokUnlimited()
    {
        return $this->promo->p_tipe_stok == "unlimited";
    }

    public function getPromo()
    {
        return $this->promo;
    }

    public function total($subTotal)
    {
        $tipe = $this->promo->p_tipe;
        return ($tipe == "fixed") ?
            $subTotal - $this->promo->p_isi : $subTotal - ($subTotal * ($this->promo->p_isi / 100));
    }

    public function decreaseStok()
    {
        return $this->promoQuery::where("p_kode", $this->promoCode)->update([
            "p_jumlah" => $this->promo->p_jumlah - 1
        ]);
    }

    public function addDetailUser()
    {
        $this->detailUserPromo::create([
            "user_id" => $this->user_id,
            "promo_id" => $this->promo->id,
        ]);
    }

    public function _model()
    {
        $this->detailUserPromo = new DetailUserPromo();
        $this->promoQuery = new Promo();
        $this->promo = $this->promoQuery::with("user")->where("p_kode", $this->promoCode)->first();
    }
}
