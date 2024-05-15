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
     * @param integer $id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->transaksiKendaraan::whereId($id)->first();
    }

    /**
     * Get All Data Kendaraan
     * @return Mixed
     */
    public function getAll()
    {
        return $this->transaksiKendaraan;
    }

    /**
     * Get All Data Transaksi Kendaraan With Detail Transaksi Kendaraan
     * @return Mixed
     */
    public function getAllWithDetailTransaksiKendaraan()
    {
        return $this->transaksiKendaraan::with(["user", "kendaraans" => [
            "merkKendaraan"
        ]]);
    }

    /**
     * Store data kendaraan
     * @param array $data
     * @return Mixed
     */
    public function store($data)
    {
        $dataKendaraan = $this->transaksiKendaraan::create($data);
        return $dataKendaraan;
    }

    /**
     * 
     * @param integer $id
     * @param array $data
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
     * @param integer $id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataKendaraan = $this->transaksiKendaraan::findOrFail($id);
        $dataKendaraan->delete();

        return $dataKendaraan;
    }
}
