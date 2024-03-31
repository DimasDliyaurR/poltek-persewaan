<?php

namespace App\Repositories\Asrama;

interface AsramaRepository
{
    public function getDataById($id);

    /**
     * Get All data asrama
     * @return Array
     */
    public function getAll();

    /**
     * Store data ke Asrama
     * @param data
     * @return Array
     */
    public function store($data);

    /**
     * Update data dari data asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id);

    /**
     * Delete data dari data asrama
     * @param id
     * @return boolean
     */
    public function delete($id);

    /**
     * Search data dari data asrama
     * @param search
     * @return array
     */
    public function search($search);
}
