<?php

namespace App\Http\Controllers;

use App\Models\AlatBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TransaksiAlatBarang;

class FEAlatBarangController extends Controller
{
    public function index ()
    {
        $alatbarang = AlatBarang::latest();
        if(request('search')){
            $alatbarang->WHERE('a_nama', 'like' ,'%'.request('search').'%');
        }
        return view('alatBarang.index', [
            "title" => "Alat Barang",
            "AlatBarang" => $alatbarang->paginate(6),
        ]);
    }
    public function listEventAb(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiAlatBarang::where('tab_tanggal_pesanan', '>=', $start)
        ->where('tab_tanggal_kembali', '<=', $end)->get()
        ->map(fn  ($item)=> [
            'id' =>$item->id,
            'title' =>$item->tab_title,
            'start'=>$item->tab_tanggal_pesanan,
            'end'=>$item->tab_tanggal_kembali,
        ]);
        return response()->json($events);
    }
    public function kalenderAlatBarang()
    {
        return view('alatBarang.kalender', [
            "title" => 'Kalender Alat Barang'
        ]);
    }

}