<?php

namespace App\Repositories\AlatBarang\SatuanAlatBarang;

interface SatuanAlatBarangRepository
{
    /**
     * Get All Data Satuan Alat Barang
     * @return object
     */
    public function getAll();

    /**
     * Get Data Satuan Alat Barang By Id
     * @param int $id
     * @return object
     */
    public function getDataById($id);

    /**
     * Created Data Satuan Alat Barang
     * @param array $data
     * @return object
     */
    public function store($data);

    /**
     * Update Data Satuan Alat Barang
     * @param array $data
     * @param int $id
     * @return object
     */
    public function update($data, $id);

    /**
     * Delete Data Satuan Alat Barang
     * @param int $id
     * @return object
     */
    public function delete($id);

    /**
     * Delete Data Satuan Alat Barang
     * @param array $data
     * @return object
     */
    public function search($data);
}
