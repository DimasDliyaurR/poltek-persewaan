<?php

namespace App\Services\AlatBarang;

interface AlatBarangService
{
    /**
     * Get Data Alat Barang By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataAlatBarangById($id);

    /**
     * Get Data Foto Alat Barang By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataFotoAlatBarangById($id);

    /**
     * Get Data Satuan Alat Barang By Id
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataSatuanAlatBarangById($id);

    /**
     * Get All data Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllAlatBarang();

    /**
     * Get All data Foto Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllFotoAlatBarang();

    /**
     * Get All data Satuan Alat Barang
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllSatuanAlatBarang();

    /**
     * Store Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createAlatBarang($data);

    /**
     * Store Foto Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createFotoAlatBarang($data);

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createPaymentMethod($data);

    /**
     * Store Satuan Alat Barang
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function createSatuanAlatBarang($data);

    /**
     * Update Alat Barang
     * @param array $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePaymentMethod($data, $id);

    /**
     * Update Alat Barang
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateAlatBarang($data, $id);

    /**
     * Update Foto Alat Barang
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateFotoAlatBarang($data, $id);

    /**
     * Update Satuan Alat Barang
     * @param array $data
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateSatuanAlatBarang($data, $id);

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

    /**
     * Delete Satuan Alat Barang
     * @param int $id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroySatuanAlatBarang($id);
}
