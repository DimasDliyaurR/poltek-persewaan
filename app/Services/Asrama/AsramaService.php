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
}
