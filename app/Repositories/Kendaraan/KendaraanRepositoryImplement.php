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
     * Get Data by Id Kendaraan
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->kendaraan::whereId($id)->first();
    }

    /**
     * Get All Data With Merk Kendaraan Data
     * @return array
     */
    public function getAllDataWithMerkKendaraan()
    {
        return $this->kendaraan::with("merkKendaraan");
    }

    /**
     * Get All Data Kendaraan
     * @return Mixed
     */
    public function getAll()
    {
        return $this->kendaraan;
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
        $dataKendaraan = $this->kendaraan::findOrFail($id);
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

    /**
     * Search Data Kendaraan
     * @param search
     * @return array
     */
    public function search($search)
    {
        return $this->kendaraan::join("merk_kendaraans", "kendaraans.merk_kendaraan_id", "=", "merk_kendaraans.id")->where(function ($q) use ($search) {
            $q->where('kendaraans.k_plat', "LIKE", "%$search%")
                ->orWhere('merk_kendaraans.mk_seri', "LIKE", "%$search%")
                ->orWhere('merk_kendaraans.mk_merk', "LIKE", "%$search%")
                ->orWhere('merk_kendaraans.mk_tarif', "LIKE", "%$search%");
        });
    }
}
