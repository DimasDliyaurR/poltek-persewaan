<?php

namespace App\Repositories\Kendaraan;

use App\Repositories\Kendaraan\KendaraanRepository;
use App\Models\Kendaraan;

class KendaraanRepositoryImplement implements KendaraanRepository
{
    private $kendaraan;

    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }

    /**
     * 
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->kendaraan::whereId($id)->get();
    }

    /**
     * Get All Data Kendaraan
     * @param
     * @return Mixed
     */
    public function getAll()
    {
        return $this->kendaraan::all();
    }

    /**
     * Store data kendaraan
     * @param Data
     * @return Mixed
     */
    public function store($data)
    {
        $dataKendaraan = $this->kendaraan::create($data);
        return $dataKendaraan;
    }

    /**
     * 
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataKendaraan = $this->kendaraan::finOrFail($id);
        $dataKendaraan->update($data);
        return $dataKendaraan;
    }

    /**
     * Delete data kendaraan
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataKendaraan = $this->kendaraan::findOrFail($id);
        $dataKendaraan->delete();

        return $dataKendaraan;
    }
}
