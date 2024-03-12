<?php

namespace App\Layanan\DetailFotoLayanan;

use App\Layanan\DetailFotoLayanan\DetailFotoLayananRepository;
use App\Models\DetailFotoLayanan;

class DetailFotoLayananRepositoryImplement implements DetailFotoLayananRepository
{
    private $layanan;

    public function __construct(DetailFotoLayanan $layanan)
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
        $dataLayanan = $this->layanan::finOrFail($id);
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
