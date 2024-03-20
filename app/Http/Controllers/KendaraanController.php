<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestMerkKendaraan;
use App\Services\Kendaraan\KendaraanService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class KendaraanController extends Controller
{
    private $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function indexMerkKendaraan()
    {
        $kendaraans = $this->kendaraanService->getAllDataMerkKendaraan();

        return view("admin.kendaraan.lihat", [
            "title" => "Merk Kendaraan",
            "action" => "merkKendaraan.show",
            "kendaraans" => $kendaraans,
        ]);
    }

    public function storeMerkKendaraan(RequestMerkKendaraan $request)
    {
        try {
            $this->kendaraanService->storeMerkKendaraan($request->all());
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }
    }
}
