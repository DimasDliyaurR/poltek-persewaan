<?php

namespace App\Repositories\Asrama\TransaksiAsrama;

use App\Models\TransaksiAsrama;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepository;

class TransaksiAsramaRepositoryImplement implements TransaksiAsramaRepository
{
    private $transaksiAsrama;

    public function __construct(TransaksiAsrama $transaksiAsrama)
    {
        $this->transaksiAsrama = $transaksiAsrama;
    }

    /**
     * Get Data Transaksi Asrama by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::whereId($id)->get();

        return $transaksiAsramaData;
    }

    /**
     * Get All data Transaksi Asrama
     * @return Array
     */
    public function getAll()
    {
        $transaksiAsramaData = $this->transaksiAsrama::all();

        return $transaksiAsramaData;
    }

    /**
     * Store data to Transaksi Asrama
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $transaksiAsramaData = $this->transaksiAsrama::create($data);

        return $transaksiAsramaData;
    }

    /**
     * Update data dari data Transaksi Asrama yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::findOrFail();
        $transaksiAsramaData->update($data);

        return $transaksiAsramaData;
    }

    /**
     * Delete data dari data Transaksi Asrama
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $transaksiAsramaData = $this->transaksiAsrama::findOrFail($id);
        $transaksiAsramaData->delete();

        return $transaksiAsramaData;
    }
}
