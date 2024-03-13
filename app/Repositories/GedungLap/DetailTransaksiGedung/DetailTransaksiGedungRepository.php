<?php

namespace App\Repositories\GedungLap\DetailTransaksiGedung;

interface DetailTransaksiGedungRepository
{
    /**
     * Get Data Gedung Lapangan by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Gedung Lapangan
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Gedung Lapangan
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Gedung Lapangan yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Gedung Lapangan
     * @param id
     * @return boolean
     */
    public function delete($id);
}
