<?php

namespace App\Repositories\Promo\DetailUserPromo;

use App\Models\DetailUserPromo;

class DetailUserPromoRepositoryImplement implements DetailUserPromoRepository
{
    private $detailUserPromo;

    public function __construct(DetailUserPromo $detailUserPromo)
    {
        $this->detailUserPromo = $detailUserPromo;
    }

    /**
     * Get All Data Detail Kategori Promo
     * @return array
     */
    public function getAll()
    {
        return $this->detailUserPromo;
    }

    /**
     * Create Data Detail Kategori Promo
     * @param array $data
     * @return array
     */
    public function store($data)
    {
        return $this->detailUserPromo->create($data);
    }

    /**
     * Update Data Detail Kategori Promo
     * @param array $data
     * @param int $id
     * @return array
     */
    public function update($data, $id)
    {
        return $this->detailUserPromo->findOrFail($id)->update($data);
    }

    /**
     * Delete Data Detail Kategori Promo
     * @param int $id
     * @return array
     */
    public function destroy($id)
    {
        return $this->detailUserPromo->findOrFail($id)->delete();
    }
}
