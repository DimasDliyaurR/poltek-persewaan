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
        $kendaraans = MerkKendaraan::with("kendaraans")->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")
        ]);
        $kendaraans = MerkKendaraan::latest();
        if(request('search')){
            $kendaraans->where('mk_seri', 'like', '%' . request('search'). '%');
        }

        return view('transportasi.index', [
            "title" => "Transportasi",
            "kendaraans" => $kendaraans->paginate(6)
        ]);
    }
    public function detail()
    {
        //$kendaraans = Kendaraan::with('MerkKendaraan')->find($id);
        return view('transportasi.detail', [
            "title" => "Kendaraan",
            //"kendaraan" => $kendaraans
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
    public function pesan()
    {
        return view('transportasi.transaksi_pesan', [
            "title" => "Pesan Transportasi"
        ]);
    }
    public function invoice()
    {
        return view('transportasi.transaksi_invoice',[
            "title" => "Invoice Transportasi"
        ]);
    }
}
