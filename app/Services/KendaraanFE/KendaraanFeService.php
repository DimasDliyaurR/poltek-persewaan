<?php 

namespace App\Services\KendaraanFE;

interface KendaraanService
{
    /**
     * Get Data Kendaraan By Id Kendaraan
     * @param id
     * @return Array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getDataKendaraanById($id);

    /**
     * Get Data Merk Kendaraan By Id Merk Kendaraan
     * @param Id
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getDataMerkKendaraanById($id);

    /**
     * Get All Data Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraan();

    /**
     * Get All Data Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraanWithMerkKendaraan();

    /**
     * Get All Data Merk Kendaraan
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataMerkKendaraan();

    /**
     *  Store Data Kendaraan
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeKendaraan($data);

    /**
     *  Store Data Merk Kendaraan
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeMerkKendaraan($data);

    /**
     * Update Data Kendaraan
     * @param data , id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function updateKendaraan($data, $id);

    /**
     * Update Data Merk Kendaraan
     * @param data , id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function updateMerkKendaraan($data, $id);

    /**
     * Delete Data Kendaraan
     * @param id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function destroyKendaraan($id);

    /**
     * Delete Data Merk Kendaraan
     * @param id
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function destroyMerkKendaraan($id);
}