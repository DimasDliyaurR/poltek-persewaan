<?php

namespace App\Repositories\GedungLap\JadwalGedung;

interface JadwalGedungRepository
{
    /**
     * Get Data Jadwal Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Jadwal Gedung Lapangan
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Jadwal Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Jadwal Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Jadwal Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id);
}
