<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KendaraanFE\KendaraanFeService;

class KendaraanFeController extends Controller
{
    protected $kendaraanFeService;
    public function __construct(KendaraanFeService $kendaraanFeService)
    {
        $this->kendaraanFeService = $kendaraanFeService;
    }
    public function index()
    {
        $kendaraans = $this->kendaraanFeService->getAllDataWithMerkKendaraan();
        // return view('kategori.transportasi', [
        //     "title" => "Kendaraan",
        //     "kendaraans" => $kendaraans
        ]);
    }
}
