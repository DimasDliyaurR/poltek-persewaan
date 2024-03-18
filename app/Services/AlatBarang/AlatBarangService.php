<?php

namespace App\Services\AlatBarang;

interface AlatBarangService
{
    /**
     * Get Data Alat Barang By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataAlatBarangById($id);

    /**
     * Get Data Foto Alat Barang By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataFotoAlatBarangById($id);

    /**
     * Get All data Alat Barang
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllAlatBarang();

    /**
     * Get All data Foto Alat Barang
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllFotoAlatBarang();

    /**
     * Store Alat Barang
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeAlatBarang($data);

    /**
     * Store Foto Alat Barang
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeFotoAlatBarang($data);

    /**
     * Update Alat Barang
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateAlatBarang($data, $id);

    /**
     * Update Foto Alat Barang
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateFotoAlatBarang($data, $id);

    /**
     * Delete Alat Barang
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyAlatBarang($id);

    /**
     * Delete Foto Alat Barang
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyFotoAlatBarang($id);
}
