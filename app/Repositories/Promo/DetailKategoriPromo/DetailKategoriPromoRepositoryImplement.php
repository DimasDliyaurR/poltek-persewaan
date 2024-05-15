<?php

namespace App\Repositories\Promo\DetailKategoriPromo;

use App\Models\DetailKategoriPromo;
use App\Repositories\Promo\DetailKategoriPromo\DetailKategoriPromoRepository;

class DetailKategoriPromoRepositoryImplement implements DetailKategoriPromoRepository
{
    private $detailKategoriPromoRepository;

    public function __construct(DetailKategoriPromo $detailKategoriPromoRepository)
    {
        $this->detailKategoriPromoRepository = $detailKategoriPromoRepository;
    }

    /**
     * Get All Data Detail Kategori Promo With All Relationship Eager Loading
     * @return array
     */
    public function getAllWithAllRelation()
    {
        return $this->detailKategoriPromoRepository::with("asramas", "alat_barangs", "gedung_laps", "kendaraans", "layanans");
    }

    /**
     * Get All Data Detail Kategori Promo
     * @return array
     */
    public function getAll()
    {
        return $this->detailKategoriPromoRepository;
    }

    /**
     * Create Data Detail Kategori Promo
     * @param array $data
     * @return array
     */
    public function store($data)
    {
        return $this->detailKategoriPromoRepository->create($data);
    }

    /**
     * Update Data Detail Kategori Promo
     * @param array $data
     * @param int $id
     * @return array
     */
    public function update($data, $id)
    {
        return $this->detailKategoriPromoRepository->findOrFail($id)->update($data);
    }

    /**
     * Delete Data Detail Kategori Promo
     * @param int $id
     * @return array
     */
    public function destroy($id)
    {
        return $this->detailKategoriPromoRepository->findOrFail($id)->delete();
    }
}
