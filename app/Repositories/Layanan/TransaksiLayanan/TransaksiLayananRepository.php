<?php

namespace App\Repositories\Layanan\TransaksiLayanan;

interface TransaksiLayananRepository
{
    /**
     *  Get Data By id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id);

    /**
     * Get All Data layanan
     * @param
     * @return Mixed
     */
    public function getAll();

    /**
     * Get All Data Transaksi layanan
     * @return Mixed
     */
    public function getAllWithDetailTransaksi();

    /**
     * Store data layanan
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
     * Delete data layanan
     * @param id
     * @return Mixed
     */
    public function delete($id);
}
