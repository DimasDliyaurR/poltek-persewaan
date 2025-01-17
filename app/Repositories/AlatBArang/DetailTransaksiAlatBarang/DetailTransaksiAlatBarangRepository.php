<?php

namespace App\Repositories\AlatBarang\DetailTransaksiAlatBarang;

interface DetailTransaksiAlatBarangRepository
{
    /**
     * Get Data Alat Barang by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Alat Barang
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Alat Barang
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Alat Barang yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Alat Barang
     * @param id
     * @return boolean
     */
    public function delete($id);
}
