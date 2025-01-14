<?php

namespace App\Repositories\AlatBarang\DetailTransaksiAlatBarang;

use App\Models\DetailTransaksiAlatBarang;
use App\Repositories\AlatBarang\DetailTransaksiAlatBarang\DetailTransaksiAlatBarangRepository;

class DetailTransaksiAlatBarangRepositoryImplement implements DetailTransaksiAlatBarangRepository
{
    private $alatBarang;

    public function __construct(DetailTransaksiAlatBarang $alatBarang)
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
        $alatBarangData = $this->alatBarang::whereId($id)->get();

        return $alatBarangData;
    }

    /**
     * Get All data Alat Barang
     * @return Array
     */
    public function getAll()
    {
        $alatBarangData = $this->alatBarang::all();

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
