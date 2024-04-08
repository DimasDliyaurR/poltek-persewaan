<?php

namespace App\Repositories\Asrama\TipeAsrama;

use App\Models\TipeAsrama;

class TipeAsramaRepositoryImplement implements TipeAsramaRepository
{
    protected $tipeAsrama;

    public function __construct(TipeAsrama $tipeAsrama)
    {
        $this->tipeAsrama = $tipeAsrama;
    }

    /**
     * Get All data Tipe Asrama
     * @return boolean
     */
    public function getAll()
    {
        return $this->tipeAsrama;
    }

    /**
     * Get All data Tipe Asrama With Fasilitas Asrama
     * @return boolean
     */
    public function getAllWithDataFasilitas()
    {
        return $this->tipeAsrama::with("fasilitasAsramas");
    }

    /**
     * Get Data By Id
     * @param integer $id
     * @return boolean
     */
    public function getDataById($id)
    {
        return $this->tipeAsrama::whereId($id);
    }

    /**
     * Created Tipe Asrama
     * @param array $data
     * @return boolean
     */
    public function store($data)
    {
        return $this->tipeAsrama->create($data);
    }

    /**
     * Update Tipe Asrama
     * @param array $data
     * @param integer $id
     * @return boolean
     */
    public function update($data, $id)
    {
        return $this->tipeAsrama->findOrFail($id)->update($data);
    }

    /**
     * Update Tipe Asrama
     * @param integer $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->tipeAsrama->findOrFail($id)->delete();
    }

    /**
     * Search Data Tipe Asrama
     * @param search
     * @return array
     */
    public function search($search)
    {
        return $this->tipeAsrama::where(function ($q) use ($search) {
            $q->where('ta_tarif', "LIKE", "%$search%")
                ->orWhere('ta_nama', "LIKE", "%$search%");
        });
    }
}
