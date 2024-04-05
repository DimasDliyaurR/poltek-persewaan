<?php

namespace App\Repositories\Layanan\TransaksiLayanan;

use App\Models\TransaksiLayanan;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepository;

class TransaksiLayananRepositoryImplement implements TransaksiLayananRepository
{
    private $layanan;

    public function __construct(TransaksiLayanan $layanan)
    {
        $this->layanan = $layanan;
    }

    /**
     *  Get Data By id
     * @param Id
     * @return Mixed
     */
    public function getDataById($id)
    {
        return $this->layanan::whereId($id)->first();
    }

    /**
     * Get All Data layanan
     * @param
     * @return Mixed
     */
    public function getAll()
    {
        return $this->layanan::all();
    }

    /**
     * Get All Data Transaksi layanan
     * @param
     * @return Mixed
     */
    public function getAllWithDetailTransaksi()
    {
        return $this->layanan::with("detailTransaksiLayanans");
    }

    /**
     * Store data layanan
     * @param Data
     * @return Mixed
     */
    public function store($data)
    {
        $dataLayanan = $this->layanan::create($data);
        return $dataLayanan;
    }

    /**
     * 
     * @param data ,id
     * @return Mixed
     */
    public function update($data, $id)
    {
        $dataLayanan = $this->layanan::findOrFail($id);
        $dataLayanan->update($data);
        return $dataLayanan;
    }

    /**
     * Delete data layanan
     * @param id
     * @return Mixed
     */
    public function delete($id)
    {
        $dataLayanan = $this->layanan::findOrFail($id);
        $dataLayanan->delete();

        return $dataLayanan;
    }
}
