<?php

namespace App\Http\Controllers;


use App\Models\Kendaraan;
use App\Models\MerkKendaraan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;  // use Illuminate\Http\Request;

class FEKendaraanController extends Controller
{
    public function index()
    {
        $k = Kendaraan::latest();
        if(request('search')){
            $k->where('k_nama', 'like', '%' . request('search'). '%');
        }
        return view('kategori.kendaraan', [
            "title" => "Kendaraan",
            "kendaraans" => $k->paginate(6),
        ]);
    }
    public function detail($id)
    {
        $kendaraans = Kendaraan::with('MerkKendaraan')->find($id);
        return view('detail.detail_kendaraan', [
            "title" => "Kendaraan",
            "kendaraan" => $kendaraans
        ]);
    }
}
