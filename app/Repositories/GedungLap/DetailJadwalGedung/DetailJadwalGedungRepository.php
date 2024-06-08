<?php

namespace App\Repositories\GedungLap\DetailJadwalGedung;

interface DetailJadwalGedungRepository
{
    /**
     * Get Data Detail Jadwal Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Detail Jadwal Gedung Lapangan
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Detail Jadwal Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Detail Jadwal Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Detail Jadwal Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id);
}
