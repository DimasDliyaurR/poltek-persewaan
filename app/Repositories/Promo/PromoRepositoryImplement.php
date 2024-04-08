<?php

namespace App\Repositories\Promo;

use App\Models\Promo;
use App\Repositories\Promo\PromoRepository;

class PromoRepositoryImplement implements PromoRepository
{
    private $promoRepository;

    public function __construct(Promo $promo)
    {
        $this->promoRepository = $promo;
    }

    /**
     * Get All data promo
     * @return array 
     */
    public function getAll()
    {
        return $this->promoRepository;
    }

    /**
     * Get All Data Promo With All Relationship Eager Loading
     * @return array
     */
    public function getAllWithAllRelation()
    {
        return $this->promoRepository::with("asramas", "alat_barangs", "gedung_laps", "kendaraans", "layanans");
    }

    /**
     * Get All data promo
     * @param string $id
     * @return array
     */
    public function getDataById($id)
    {
        return $this->promoRepository::findOrFail($id)->first();
    }

    /**
     * Create data promo
     * @param array $data
     * @return array
     */
    public function store($data)
    {
        return $this->promoRepository::create($data);
    }

    /**
     * update data promo
     * @param array $data
     * @param string $id
     * @return array
     */
    public function update($data, $id)
    {
        return $this->promoRepository::findOrFail($id)->update($data);
    }

    /**
     * Destroy data promo
     * @param string $id
     * @return boolean
     */
    public function destroy($id)
    {
        return $this->promoRepository::findOrFail($id)->delete();
    }
}
