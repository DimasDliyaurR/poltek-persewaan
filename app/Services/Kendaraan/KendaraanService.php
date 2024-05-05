<?php

namespace App\Services\Kendaraan;

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
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getDataMerkKendaraanById($id);

    /**
     * Get All Data Kendaraan
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraan();

    /**
     * Get All Data Kendaraan
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataKendaraanWithMerkKendaraan();

    /**
     * Get All Data Merk Kendaraan
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function getAllDataMerkKendaraan();

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data);

    /**
     *  Store Data Kendaraan
     * @param data
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeKendaraan($data);

    /**
     *  Store Data Merk Kendaraan
     * @param data
     * @return object
     * @throws InvalidArgumentException Jika ada error pada argument
     */
    public function storeMerkKendaraan($data);

    /**
     * Update Data Kendaraan
     * @param data , id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function updateKendaraan($data, $id);

    /**
     * Update Data Merk Kendaraan
     * @param data , id
     * @return object
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

    /**
     * Order By Data Merk Kendaraan
     * @param column
     * @param order
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan pada Exception 
     */
    public function orderByMerkKendaraan($column, $order);

    /**
     * Search Data Merk Kendaraan
     * @param data
     * @return object
     */
    public function searchMerkKendaraan($data);

    /**
     * Search Data Merk Kendaraan
     * @param data
     * @return object
     */
    public function searchKendaraan($data);
}
