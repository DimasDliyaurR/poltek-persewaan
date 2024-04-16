<?php

namespace App\Http\Controllers;


use App\Models\Kendaraan;
use App\Models\MerkKendaraan;
use App\Http\Controllers\Controller;
use App\Models\TransaksiKendaraan;
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
    public function store(Request $request)
    {
        $transaksiKendaraan = TransaksiKendaraan::create([
            'user_id'=> auth()->id(),
            'code_unique'=>auth()->user()->id . str_replace("-", "", $request["tk_tanggal_sewa"]),
            'tk_tanggal_sewa' => $request->tk_tanggal_sewa,
            'tk_tanggal_kembali' => $request->tk_tanggal_kembali,
        ]);
        $transaksiKendaraan->createEvent();
    }
}
