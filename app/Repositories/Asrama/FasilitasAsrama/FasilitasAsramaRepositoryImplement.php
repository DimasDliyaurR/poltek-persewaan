<?php

namespace App\Repositories\Asrama\FasilitasAsrama;

use App\Models\FasilitasAsrama;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;

class FasilitasAsramaRepositoryImplement implements FasilitasAsramaRepository
{
    private $fasilitasAsrama;

    public function __construct(FasilitasAsrama $fasilitasAsrama)
    {
        $this->fasilitasAsrama = $fasilitasAsrama;
    }

    /**
     * Get Data Fasilitas Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama->whereId($id)->first();

        return $FasilitasAsramaData;
    }

    /**
     * Get All data Fasilitas Asrama
     * @return Array
     */
    public function getAll()
    {
        $FasilitasAsramaData = $this->fasilitasAsrama->all();

        return $FasilitasAsramaData;
    }

    /**
     * Store data to Fasilitas Asrama
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama->create($data);

        return $FasilitasAsramaData;
    }

    /**
     * Update data dari data Fasilitas Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama->findOrFail();
        $FasilitasAsramaData->update($data);

        return $FasilitasAsramaData;
    }

    /**
     * Delete data dari data Fasilitas Asrama
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $FasilitasAsramaData = $this->fasilitasAsrama->findOrFail($id);
        $FasilitasAsramaData->delete();

        return $FasilitasAsramaData;
    }
}
