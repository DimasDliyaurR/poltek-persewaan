<?php

namespace App\Repositories\Asrama\DetailFotoTipeAsrama;

interface DetailFotoTipeAsramaRepository
{
    /**
     * Get All data detail Foto Tipe Asrama
     * @return object
     */
    public function getAll();

    /**
     * Get Data By Id Foto Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataById($id);

    /**
     * Get Data By Id Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataByTipeAsramaId($id);

    /**
     * Store By Id Foto Tipe Asrama
     * @param array $data
     * @return object
     */
    public function store($data);

    /**
     * Update Detail Foto Tipe Asrama
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update($data, $id);

    /**
     * Destroy Detail Foto Tipe Asrama
     * @param int $id
     * @return bool
     */
    public function delete($id);
}
