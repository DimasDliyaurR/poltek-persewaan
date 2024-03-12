<?php

namespace App\Repositories\Kendaraan\TransaksiKendaraan;

use App\Models\TransaksiKendaraan;
use App\Repositories\Kendaraan\TransaksiKendaraan\TransaksiKendaraanRepository;

class TransaksiKendaraanRepositoryImplement implements TransaksiKendaraanRepository
{
    private $transaksiKendaraan;

    public function __construct(TransaksiKendaraan $transaksiKendaraan)
    {
        $this->transaksiKendaraan = $transaksiKendaraan;
    }

    /**
     * 
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->transaksiKendaraan::whereId($id)->get();
    }

    /**
     * Get All Data Kendaraan
     * @param
     * @return Mixed
     */
    public function getAll()
    {
        return $this->transaksiKendaraan::all();
    }

    /**
     * Store data kendaraan
     * @param Data
     * @return Mixed
     */
    public function store($data)
    {
        $dataKendaraan = $this->transaksiKendaraan::create($data);
        return $dataKendaraan;
    }

    /**
     * 
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataKendaraan = $this->transaksiKendaraan::finOrFail($id);
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
        $dataKendaraan = $this->transaksiKendaraan::findOrFail($id);
        $dataKendaraan->delete();

        return $dataKendaraan;
    }
}
