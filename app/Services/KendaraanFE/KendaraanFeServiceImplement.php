<?php

namespace App\Services\KendaraanFE;
use App\Models\Kendaraan;
use App\Repositories\KendaraanFE\KendaraanFeRepository;
use App\Repositories\KendaraanFE\KendaraanFeRepositoryImplement;
use App\Services\KendaraanFE\KendaraanFeService;

class KendaraanFeServiceImplement implements KendaraanFeService
{
    protected $kendaraanFeRepository;
    protected $merkKendaraanRepository;

    public function __construct(KendaraanFeRepositoryImplement $kendaraanFeRepository)
    {
        $this->kendaraanFeRepository = $kendaraanFeRepository;
        $this->merkKendaraanRepository = $merkKendaraanRepository;
    }

    public function getAllDataKendaraan(){
        return Kendaraan::all();
    }
    public function getAllDataWithMerkKendaraan()
    {
        return $this->kendaraanFeRepository->getAllDataWithMerkKendaraan();
    }

    public function store($data)
    {
        return $this->kendaraanFeRepository->store($data);
    }

    public function update($data, $id)
    {
        return $this->kendaraanFeRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->kendaraanFeRepository->delete($id);
    }
}