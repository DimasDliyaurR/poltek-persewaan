<?php

namespace App\Services\Asrama;

interface AsramaService
{
    /**
     * Get Data Asrama By Id Detail Foto Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataFotoTipeAsrama($id);

    /**
     * Get Data Detail Foto Tipe Asrama By Id Asrama
     * @param id string
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataDetailFotoTipeAsramaById($id);

    /**
     * Get Data Detail Foto Tipe Asrama By Id Tipe Asrama Asrama
     * @param id string
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataDetailFotoTipeAsramaByTipeAsramaId($id);

    /**
     * Get Data Asrama By Id Asrama
     * @param id string
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataAsramaById($id);

    /**
     * Get Data Asrama By Tipe Asrama Id
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataAsramaByTipeAsramaId($id);

    /**
     * Get Data Fasilitas Asrama By Id Fasilitas Asrama
     * @param id string
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataFasilitasAsramaById($id);

    /**
     * Get Data Detail Fasilitas By Asrama Id
     * @param Id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Kesalahan Exception
     */
    public function getDataDetailFasilitasByTipeAsramaId($id);

    /**
     * Get Data Tipe Asrama By Asrama Id
     * @param Id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Kesalahan Exception
     */
    public function getDataTipeAsramaById($id);

    /**
     * Get All Data Fasilitas Asrama
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataDetailFotoTipeAsrama();

    /**
     * Get All Data Fasilitas Asrama
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataAsrama();

    /**
     * Get All Data Fasilitas Asrama
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataFasilitasAsrama();

    /**
     * Get All Data Tipe Asrama
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataTipeAsrama();

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data);

    /**
     * Store Data Foto Tipe Asrama
     * @param  array $data
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeDetailFotoTipeAsrama($data);

    /**
     * Store Data Fasilitas Asrama
     * @param data object
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeAsrama($data);

    /**
     * Store Data Fasilitas Asrama
     * @param data object
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeFasilitasAsrama($data);

    /**
     * Store Data Detail Fasilitas Asrama
     * @param data object
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeDetailFasilitasAsrama($data);

    /**
     * Store Data Detail Tipe Asrama
     * @param object $data
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeTipeAsrama($data);

    /**
     * Update Alat Barang
     * @param array $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePaymentMethod($data, $id);

    /**
     * Update Detail Foto Tipe Asrama
     * @param array $dara
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateDetailFotoTipeAsrama($data, $id);

    /**
     * Update Asrama
     * @param data
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateAsrama($data, $id);

    /**
     * Update Fasilitas Asrama
     * @param data
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateFasilitasAsrama($data, $id);

    /**
     * Update Detail Fasilitas Asrama
     * @param data object
     * @param id string
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateDetailFasilitasAsrama($data, $id);

    /**
     * Update Detail Tipe Asrama
     * @param object $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateTipeAsrama($data, $id);

    /**
     * Delete Asrama
     * @param id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyDetailFotoTipeAsrama($id);

    /**
     * Delete Asrama
     * @param id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyAsrama($id);

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyFasilitasAsrama($id);

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyDetailFasilitasAsrama($id);

    /**
     * Delete Tipe Asrama
     * @param string $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyTipeAsrama($id);

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @param dataFasilitasId
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function IsExistFasilitasTransaksi($dataFasilitasId, $id);

    /**
     * Search Data Detail Fasilitas Asrama
     * @param string $search
     * @param dataFasilitasId
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function searchAsrama($search);

    /**
     * Search Data Detail Tipe Asrama
     * @param string $search
     * @return object
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function searchTipeAsrama($search);
}
