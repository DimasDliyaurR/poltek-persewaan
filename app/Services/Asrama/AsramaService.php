<?php

namespace App\Services\Asrama;

interface AsramaService
{
    /**
     * Get Data Asrama By Id Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataAsramaById($id);

    /**
     * Get Data Fasilitas Asrama By Id Fasilitas Asrama
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getDataFasilitasAsramaById($id);

    /**
     * Get All Data Fasilitas Asrama
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataAsrama();

    /**
     * Get All Data Fasilitas Asrama
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function getAllDataFasilitasAsrama();

    /**
     * Get Data Detail Fasilitas By Asrama Id
     * @param Id
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Kesalahan Exception
     */
    public function getDataDetailFasilitasByAsramaId($id);

    /**
     * Store Data Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeAsrama($data);

    /**
     * Store Data Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeFasilitasAsrama($data);

    /**
     * Store Data Detail Fasilitas Asrama
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function storeDetailFasilitasAsrama($data);

    /**
     * Update Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateAsrama($data, $id);

    /**
     * Update Fasilitas Asrama
     * @param data
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateFasilitasAsrama($data, $id);

    /**
     * Update Detail Fasilitas Asrama
     * @param data array
     * @param id string
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function updateDetailFasilitasAsrama($data, $id);

    /**
     * Delete Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyAsrama($id);

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyFasilitasAsrama($id);

    /**
     * Delete Fasilitas Asrama
     * @param id
     * @return array
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function destroyDetailFasilitasAsrama($id);

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @param dataFasilitasId
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat kesalahan Exception
     */
    public function IsExistFasilitasTransaksi($dataFasilitasId, $id);
}
