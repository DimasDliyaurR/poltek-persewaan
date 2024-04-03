<?php

namespace App\Services\Promo;

interface PromoService
{
    /**
     * Get All Promo
     * @throws InvalidArgumentException InvalidArgumentException
     * @return array
     */
    public function getAllPromo();

    /**
     * Get Data Promo By Id
     * @param string $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return array
     */
    public function getDataPromoById($id);

    /**
     * Create Data Promo
     * @param array $data
     * @throws InvalidArgumentException InvalidArgumentException
     * @return array
     */
    public function createPromo($data);

    /**
     * Create Data Promo
     * @param array $data
     * @throws InvalidArgumentException InvalidArgumentException
     */
    public function createDetailKategoriPromo($data);

    /**
     * Store Data Promo
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return array
     */
    public function storePromo($id);

    /**
     * Update Data Promo
     * @param array $data
     * @param integer $id
     * @throws InvalidArgumentException InvalidArgumentException
     * @return array
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
