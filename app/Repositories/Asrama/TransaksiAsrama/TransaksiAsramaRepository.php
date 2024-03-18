<?php

namespace App\Repositories\Asrama\TransaksiAsrama;

interface TransaksiAsramaRepository
{
    /**
     * Get Data Transaksi Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Transaksi Asrama
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Transaksi Asrama
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Transaksi Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Transaksi Asrama
     * @param id
     * @return boolean
     */
    public function delete($id);
}
