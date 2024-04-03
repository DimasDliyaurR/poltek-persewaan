<?php

namespace App\Repositories\Asrama;

use App\Models\Asrama;
use App\Repositories\Asrama\AsramaRepository;

class AsramaRepositoryImplement implements AsramaRepository
{
    private $asrama;

    public function __construct(Asrama $asrama)
    {
        $this->asrama = $asrama;
    }

    /**
     * Get Data Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $asramaData = $this->asrama->whereId($id)->first();

        return $asramaData;
    }

    /**
     * Get All data asrama
     * @return Array
     */
    public function getAll()
    {
        $asramaData = $this->asrama->paginate(5);

        return $asramaData;
    }

    /**
     * Store data to Asrama
     * @param data
     * @return array
     */
    public function store($data)
    {
        $asramaData = $this->asrama->create($data);

        return $asramaData;
    }

    /**
     * Update data dari data asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $asramaData = $this->asrama->findOrFail($id);
        $asramaData->update($data);

        return $asramaData;
    }

    /**
     * Delete data dari data asrama
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $asramaData = $this->asrama->findOrFail($id);
        $asramaData->delete();

        return $asramaData;
    }
}
