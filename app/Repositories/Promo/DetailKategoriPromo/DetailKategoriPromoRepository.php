<?php

namespace App\Repositories\Promo\DetailKategoriPromo;

interface DetailKategoriPromoRepository
{
    /**
     * Get All Data Detail Kategori Promo With All Relationship Eager Loading
     * @return array
     */
    public function getAllWithAllRelation();

    /**
     * Get All Data Detail Kategori Promo
     * @return array
     */
    public function getAll();

    /**
     * Create Data Detail Kategori Promo
     * @param array $data
     * @return array
     */
    public function store($data);

    /**
     * Update Data Detail Kategori Promo
     * @param array $data
     * @param int $id
     * @return array
     */
    public function update($data, $id);

    /**
     * Delete Data Detail Kategori Promo
     * @param int $id
     * @return array
     */
    public function destroy($id);
}
