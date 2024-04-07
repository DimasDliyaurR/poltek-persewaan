<?php

namespace App\Repositories\AlatBarang\SatuanAlatBarang;

use App\Models\SatuanAlatBarang;
use App\Repositories\AlatBarang\SatuanAlatBarang\SatuanAlatBarangRepository;

class SatuanAlatBarangRepositoryImplement implements SatuanAlatBarangRepository
{
    protected $satuanAlatBarang;

    public function __construct(SatuanAlatBarang $satuanAlatBarang)
    {
        $this->satuanAlatBarang = $satuanAlatBarang;
    }

    /**
     * Get All Data Satuan Alat Barang
     * @return object
     */
    public function getAll()
    {
        return $this->satuanAlatBarang;
    }

    /**
     * Get Data Satuan Alat Barang By Id
     * @param int $id
     * @return object
     */
    public function getDataById($id)
    {
        return $this->satuanAlatBarang::whereId($id);
    }

    /**
     * Created Data Satuan Alat Barang
     * @param array $data
     * @return object
     */
    public function store($data)
    {
        return $this->satuanAlatBarang::create($data);
    }

    /**
     * Update Data Satuan Alat Barang
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update($data, $id)
    {
        return $this->satuanAlatBarang::findOrFail($id)->update($data);
    }

    /**
     * Delete Data Satuan Alat Barang
     * @param int $id
     * @return object
     */
    public function delete($id)
    {
        return $this->satuanAlatBarang::findOrFail($id)->delete();
    }

    /**
     * Delete Data Satuan Alat Barang
     * @param array $data
     * @return object
     */
    public function search($data)
    {
        return $this->satuanAlatBarang::where(function ($q) use ($data) {
            $q->where("sab_nama", "LIKE", "%$data%");
        });
    }
}
