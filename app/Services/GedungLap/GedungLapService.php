<?php

namespace App\Services\GedungLap;

interface GedungLapService
{

    /**
     * Get Data Detail Foto Gedung Lapangan By Id
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoGedungLapById($id);

    /**
     * Get Data Detail Foto Gedung Lapangan By Gedung Lap Id
     * @param int $id
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailFotoGedungLapByGedungLapId($id);

    /**
     * Get Data Gedung Lapangan By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataGedungLapById($id);

    /**
     * Get Data Property Gedung By Id
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataPropertyGedungById($id);

    /**
     * Get All data Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailFotoGedungLap();

    /**
     * Get All data Gedung Lapangan
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllGedungLap();

    /**
     * Get All data Property Gedung
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllPropertyGedung();

    /**
     * Store Detail Foto Gedung Lapangan
     * @param array $data
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailFotoGedungLap($data);

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeGedungLap($data);

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return array
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePropertyGedung($data);

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     */
    public function updateDetailFotoGedungLap($data, $id);

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateGedungLap($data, $id);

    /**
     * Delete Detail Foto Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailFotoGedungLap($id);

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return array
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePropertyGedung($data, $id);

    /**
     * Delete Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyGedungLap($id);

    /**
     * Delete Property Gedung
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyPropertyGedung($id);
}
