<?php

namespace App\Services\Promo;

interface PromoService
{
    /**
     * Get All Promo
     * @throws InvalidArgumentException InvalidArgumentException
     * @return object
     */
    public function getAllPromo();

    /**
     * Get Kategori validated Kategori Promo
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function getValidatedKategoriPromo($kategori);

    /**
     * Get All Validated kategori Promo
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function getAllValidatedPromo();

    /**
     * Get Data Promo By Id
     * @param string $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return object
     */
    public function getDataPromoById($id);

    /**
     * Create Data Promo
     * @param object $data
     * @throws InvalidArgumentException InvalidArgumentException
     * @return object
     */
    public function createPromo($data);

    /**
     * Create Data Promo
     * @param object $data
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function createDetailUserPromo($data);

    /**
     * Store Data Promo
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return object
     */
    public function storePromo($id);

    /**
     * Update Data Promo
     * @param object $data
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return object
     */
    public function updatePromo($data, $id);

    /**
     * Destroy Data Promo
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return boolean
     */
    public function destroyPromo($id);
}
