<?php

namespace App\Services\Layanan;

interface LayananService
{
    /**
     * Get Data Layanan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataLayananById($id);

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoLayananById($id);

    /**
     * Get Data Detail Foto Layanan By Layanan Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoLayananByLayananId($id);

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataTimLayananById($id);

    /**
     * Get Data Detail Foto Layanan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataVideoLayananById($id);

    /**
     * Get Data Detail Foto Layanan By Layanan Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataVideoLayananByLayananId($id);

    /**
     * Get All data Layanan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllLayanan();

    /**
     * Get All data Detail Foto Layanan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailFotoLayanan();

    /**
     * Get All data Tim Layanan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllTimLayanan();

    /**
     * Get All data Tim Layanan By Layanan Id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllTimLayananByLayananId($id);

    /**
     * Get All data Video Layanan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllVideoLayanan();

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data);

    /**
     * Store Layanan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeLayanan($data);

    /**
     * Store Detail Foto Layanan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailFotoLayanan($data);

    /**
     * Store Tim Layanan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeTimLayanan($data);

    /**
     * Store Video Layanan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeVideoLayanan($data);

    /**
     * Update Layanan
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateLayanan($data, $id);

    /**
     * Update Detail Foto Layanan
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateDetailFotoLayanan($data, $id);

    /**
     * Update Tim Layanan
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateTimLayanan($data, $id);

    /**
     * Update Tim Layanan
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateVideoLayanan($data, $id);

    /**
     * Delete Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyLayanan($id);

    /**
     * Delete Detail Foto Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailFotoLayanan($id);

    /**
     * Delete Tim Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyTimLayanan($id);

    /**
     * Delete Video Layanan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyVideoLayanan($id);
}
