<?php

namespace App\Repositories\Kendaraan\TransaksiKendaraan;

interface TransaksiKendaraanRepository
{
    /**
     * 
     * @param Id
     * @return Mixed
     */
    public function getDataById($id);

    /**
     * Get All Data Kendaraan
     * @param
     * @return Mixed
     */
    public function getAll();

    /**
     * Store data kendaraan
     * @param Data
     * @return Mixed
     */
    public function store($data);

    /**
     * 
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id);

    /**
     * Delete data kendaraan
     * @param id
     * @return Mixed
     */
    public function delete($id);
}