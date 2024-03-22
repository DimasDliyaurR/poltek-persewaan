<?php

namespace App\Repositories\Kendaraan\MerkKendaraan;

use App\Models\MerkKendaraan;
use App\Repositories\Kendaraan\MerkKendaraan\MerkKendaraanRepository;

class MerkKendaraanRepositoryImplement implements MerkKendaraanRepository
{
    private $merkKendaraan;

    public function __construct(MerkKendaraan $merkKendaraan)
    {
        $this->merkKendaraan = $merkKendaraan;
    }

    /**
     *  Get Data Merk Kendaraan By Id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {

        return $this->merkKendaraan::findOrFail($id);
    }

    /**
     * Get All Data Merk Kendaraan
     * @param
     * @return Mixed
     */
    public function getAll()
    {
        return $this->merkKendaraan::paginate(5);
    }

    /**
     * Store data Merk Kendaraan
     * @param Data
     * @return Mixed
     */
    public function store($data)
    {
        $dataKendaraan = $this->merkKendaraan::create($data);
        return $dataKendaraan;
    }

    /**
     * Update data Merk Kendaraan
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataKendaraan = $this->merkKendaraan::findOrFail($id);
        $dataKendaraan->update($data);
        return $dataKendaraan;
    }

    /**
     * Delete data Merk Kendaraan
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataKendaraan = $this->merkKendaraan::findOrFail($id);
        $dataKendaraan->delete();

        return $dataKendaraan;
    }
}
