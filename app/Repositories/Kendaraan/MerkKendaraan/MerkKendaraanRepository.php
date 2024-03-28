<?php

namespace App\Repositories\Kendaraan\MerkKendaraan;

interface MerkKendaraanRepository
{
    /**
     *  Get Data Merk Kendaraan By Id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id);

    /**
     * Get All Data Merk Kendaraan
     * @param
     * @return Mixed
     */
    public function getAll();

    /**
     * Store data Merk Kendaraan
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
     * Delete data Merk Kendaraan
     * @param id
     * @return Mixed
     */
    public function delete($id);

    /**
     * Order By ? Data Merk Kendaraan
     * @param column
     * @param order
     * @return array
     */
    public function orderBy($column, $order);

    /**
     * Search Data Merk Kendaraan
     * @param search
     * @return array
     */
    public function search($search);
}
