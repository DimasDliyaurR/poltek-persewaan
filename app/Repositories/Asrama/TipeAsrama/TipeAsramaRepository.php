<?php

namespace App\Repositories\Asrama\TipeAsrama;

interface TipeAsramaRepository
{
    /**
     * Get All data Tipe Asrama
     * @return boolean
     */
    public function getAll();

    /**
     * Get All data Tipe Asrama With Fasilitas Asrama
     * @return boolean
     */
    public function getAllWithDataFasilitas();

    /**
     * Get Data By Id
     * @param integer $id
     * @return boolean
     */
    public function getDataById($id);

    /**
     * Created Tipe Asrama
     * @param array $data
     * @return boolean
     */
    public function store($data);

    /**
     * Update Tipe Asrama
     * @param array $data
     * @param integer $id
     * @return boolean
     */
    public function update($data, $id);

    /**
     * Update Tipe Asrama
     * @param integer $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Search Data Tipe Asrama
     * @param search
     * @return array
     */
    public function search($search);
}
