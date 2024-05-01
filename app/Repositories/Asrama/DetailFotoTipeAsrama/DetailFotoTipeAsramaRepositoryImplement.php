<?php

namespace App\Repositories\Asrama\DetailFotoTipeAsrama;

use App\Models\DetailFotoTipeAsrama;

class DetailFotoTipeAsramaRepositoryImplement implements DetailFotoTipeAsramaRepository
{
    private $detailFotoTipeAsrama;

    public function __construct(DetailFotoTipeAsrama $detailFotoTipeAsrama)
    {
        $this->detailFotoTipeAsrama = $detailFotoTipeAsrama;
    }

    /**
     * Get All data detail Foto Tipe Asrama
     * @return object
     */
    public function getAll()
    {
        return $this->detailFotoTipeAsrama::with("tipeAsramas");
    }

    /**
     * Get Data By Id Foto Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataById($id)
    {
        return $this->detailFotoTipeAsrama->findOrFail($id);
    }

    /**
     * Get Data By Id Tipe Asrama
     * @param int $id
     * @return object
     */
    public function getDataByTipeAsramaId($id)
    {
        return $this->detailFotoTipeAsrama->whereTipeAsramaId($id);
    }

    /**
     * Store By Id Foto Tipe Asrama
     * @param array $data
     * @return object
     */
    public function store($data)
    {
        return $this->detailFotoTipeAsrama->create($data);
    }

    /**
     * Update Detail Foto Tipe Asrama
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update($data, $id)
    {
        $data = $this->detailFotoTipeAsrama->findOrFail($id);
        $data->update($data);

        return $data;
    }

    /**
     * Destroy Detail Foto Tipe Asrama
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $data = $this->detailFotoTipeAsrama->findOrFail($id);
        $data->delete();
    }
}
