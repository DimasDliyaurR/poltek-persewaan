<?php

namespace App\Repositories\Promo;

interface PromoRepository
{
    /**
     * Get All data promo
     * @return array 
     */
    public function getAll();

    /**
     * Get Promo kategori khusus Data Detail Kategori Promo
     * @param string $kategori
     * @return object
     */
    public function getValidatedKategori(string $kategori);

    /**
     * Get All Promo Data Detail Kategori Promo
     * @return object
     */
    public function getAllValidated();

    /**
     * Get All data promo
     * @param string $id
     * @return array
     */
    public function getDataById($id);

    /**
     * Create data promo
     * @param array $data
     * @return array
     */
    public function store($data);

    /**
     * update data promo
     * @param array $data
     * @param string $id
     * @return array
     */
    public function update($data, $id);

    /**
     * Destroy data promo
     * @param string $id
     * @return boolean
     */
    public function destroy($id);
}
