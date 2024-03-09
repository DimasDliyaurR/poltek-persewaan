<?php

namespace App\Services\Kendaraan;

use App\Repositories\Kendaraan\KendaraanRepository;
use App\Services\Kendaraan\KendaraanService;

class KendaraanServiceImplement implements KendaraanService
{
    private $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }
}
