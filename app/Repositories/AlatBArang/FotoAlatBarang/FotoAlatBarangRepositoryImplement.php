<?php

namespace App\Repositories\AlatBarang\FotoAlatBarang;

use App\Models\FotoAlatBarang;
use App\Repositories\AlatBarang\FotoAlatBarang\FotoAlatBarangRepository;

class FotoAlatBarangRepositoryImplement implements FotoAlatBarangRepository
{
    private $alatBarang;

    public function __construct(FotoAlatBarang $alatBarang)
    {
        $this->alatBarang = $alatBarang;
    }

    /**
     * Get Data Alat Barang by Id 
     * @param id
     * @return Array
     */
    public function getDataById($id)
    {
        $alatBarangData = $this->alatBarang::whereId($id)->first();

        return $alatBarangData;
    }

    /**
     *  Get Data By Alat Barang id
     * @param Id
     * @return Mixed
     */
    public function getDataByAlatBarangId($id)
    {
        return $this->alatBarang::whereAlatBarangId($id)->paginate(5);
    }

    /**
     * Get All data Alat Barang
     * @return Array
     */
    public function getAll()
    {
        $alatBarangData = $this->alatBarang::paginate(5);

        return $alatBarangData;
    }

    /**
     * Store data to Alat Barang
     * @param data
     * @return Array
     */
    public function store($data)
    {
        $alatBarangData = $this->alatBarang::create($data);

        return $alatBarangData;
    }

    /**
     * Update data dari data Alat Barang yang sudah ada
     * @param data , id
     * @return Array
     */
    public function update($data, $id)
    {
        $alatBarangData = $this->alatBarang::findOrFail();
        $alatBarangData->update($data);

        return $alatBarangData;
    }

    /**
     * Delete data dari data Alat Barang
     * @param id
     * @return boolean
     */
    public function delete($id)
    {
        $alatBarangData = $this->alatBarang::findOrFail($id);
        $alatBarangData->delete();

        return $alatBarangData;
    }
}
