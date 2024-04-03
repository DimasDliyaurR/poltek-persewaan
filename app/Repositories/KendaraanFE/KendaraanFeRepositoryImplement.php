<?php

namespace App\Repositories\KendaraanFE;
use App\Models\Kendaraan;

class KendaraanFeRepositoryImplement implements KendaraanFeRepository
{
    public function getDataById($id)
    {
        return Kendaraan::find($id);
    }

    public function getAll()
    {
        return Kendaraan::all();
    }

    public function getAllDataWithMerkKendaraan()
    {
        return Kendaraan::with('merk_kendaraan')->get();
    }

    public function store($data)
    {
        return Kendaraan::create($data);
    }

    public function update($data, $id)
    {
        return Kendaraan::find($id)->update($data);
    }

    public function delete($id)
    {
        return Kendaraan::find($id)->delete();
    }
}