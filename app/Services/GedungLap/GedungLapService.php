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
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataGedungLapById($id);

    /**
     * Get Data Jadwal Gedung Lapangan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataJadwalGedungLapById($id);

    /**
     * Get Data Detail Jadwal Gedung Lapangan By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataDetailJadwalGedungLapById($id);

    /**
     * Get Data Property Gedung By Id
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getDataPropertyGedungById($id);

    /**
     * Get All data Gedung Lapangan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailFotoGedungLap();

    /**
     * Get All data Gedung Lapangan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllGedungLap();

    /**
     * Get All data Jadwal Gedung Lapangan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllJadwalGedungLap();

    /**
     * Get All data Detail Jadwal Gedung Lapangan
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllDetailJadwalGedungLap();

    /**
     * Store Payment Method
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePaymentMethod($data);

    /**
     * Get All data Property Gedung
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function getAllPropertyGedung();

    /**
     * Store Detail Foto Gedung Lapangan
     * @param array $data
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailFotoGedungLap($data);

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeGedungLap($data);

    /**
     * Store Jadwal Gedung Lapangan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeJadwalGedungLap($data);

    /**
     * Store Detail Jadwal Gedung Lapangan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storeDetailJadwalGedungLap($data);

    /**
     * Store Gedung Lapangan
     * @param data array
     * @return object
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function storePropertyGedung($data);

    /**
     * Update Alat Barang
     * @param array $data
     * @param integer $id
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updatePaymentMethod($data, $id);

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return object
     */
    public function updateDetailFotoGedungLap($data, $id);

    /**
     * Update Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return object
     * @throws InvalidArgumentException Jika Terdapat Exception
     */
    public function updateGedungLap($data, $id);

    /**
     * Update Jadwal Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return object
     */
    public function updateJadwalGedungLap($data, $id);

    /**
     * Update Detail Jadwal Gedung Lapangan
     * @param Data array
     * @param id integer
     * @return object
     */
    public function updateDetailJadwalGedungLap($data, $id);

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
     * @return object
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
     * Delete Jadwal Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyJadwalGedungLap($id);

    /**
     * Delete Detail Jadwal Gedung Lapangan
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyDetailJadwalGedungLap($id);

    /**
     * Delete Property Gedung
     * @param id integer
     * @return boolean
     * @throws InvalidArgumentException Jika terdapat Exception
     */
    public function destroyPropertyGedung($id);
}
