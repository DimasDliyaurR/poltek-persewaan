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
        $query = MerkKendaraan::with("transportasi")->withCount([
            "transportasi" => fn ($q) => $q->where("k_status", "=", "tersedia")
        ])->latest();

        if (request('search')) {
            $query->where('mk_seri', 'like', '%' . request('search'). '%');
        }

        $transportasi = $query->paginate(6);

        return view('transportasi.index', [
            "title" => "Transportasi",
            "transportasi" => $transportasi
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
    public function print_invoice()
    {
        return view('transportasi.invoice_print',[
            "title" => "Print Invoice Transportasi"
        ]);
    }
    public function listEventTransportasi(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiKendaraan::where('tk_tanggal_pelaksanaan', '>=', $start) 
        ->where('tk_tanggal_kembali', '<=', $end)
        ->get()
        ->map(fn ($item)=>[
            'id'=>$item->id,
            'title'=>$item->tk_title,
            'start'=>$item->tk_tanggal_pelaksanaan,
            'end'=>$item->tk_tanggal_kembali
        ]);
        return response()->json($events);
    }
    public function kalender()
    {
        return view('transportasi.kalender',[
            "title" => "Kalender Transportasi"
        ]);
    }
}
