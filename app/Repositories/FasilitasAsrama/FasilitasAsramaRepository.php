<?php

namespace App\Repositories\FasilitasAsrama;

interface FasilitasAsramaRepository
{
    /**
     * Get Data Fasilitas Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id);

    /**
     * Get All data Fasilitas Asrama
     * @return Array
     */
    public function getAll();

    /**
     * Store data to Fasilitas Asrama
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data Fasilitas Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data Fasilitas Asrama
     * @param id
     * @return boolean
     */
    public function delete($id);
}
