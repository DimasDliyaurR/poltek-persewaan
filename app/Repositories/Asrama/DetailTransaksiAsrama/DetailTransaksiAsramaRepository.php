<?php

namespace App\Repositories\Asrama\DetailTransaksiAsrama;

interface DetailTransaksiAsramaRepository
{
    /**
     * Get Data Detail Fasilitas Asrama By Id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id);

    /**
     * Get all data Detail fasilitas Asrama
     * @return Mixed
     */
    public function getAll();

    /**
     * Store Data Detail Fasilitas Asrama
     * @param data
     * @return Mixed
     */
    public function store($data);

    /**
     * 
     * @param Data , id
     * @return Mixed
     */
    public function update($data, $id);

    /**
     * Delete Data Detail Fasilitas Asrama
     * @param id
     * @return Mixed
     */
    public function delete($id);
}
