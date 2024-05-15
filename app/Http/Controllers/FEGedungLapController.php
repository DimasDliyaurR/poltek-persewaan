<?php

namespace App\Http\Controllers;

use App\Models\GedungLap;
use App\Models\TransaksiGedung;
use Illuminate\Http\Request;
use App\Services\KendaraanFE\KendaraanFeService;


class FEGedungLapController extends Controller
{
    public function index()
    {
        $gedung_lap = GedungLap::latest();
        if (request('search')) {
            $gedung_lap->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('GedungLap.index', [
            "title" => "Gedung Lapangan",
            "gedung_lap" => $gedung_lap->paginate(3)
        ]);
    }
    public function detail($id)
    {
        $gedung_lap = GedungLap::find($id);
        return view('detail.detail_gedung', [
            "title" => "Detail Gedung",
            "gedung_lap" => $gedung_lap
        ]);
    }
    public function listEventGedungLap(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiGedung::where('tg_tanggal_pelaksanaan', '>=' ,$start)
        ->where('tg_tanggal_kembali', '<=', $end)
        ->get()
        ->map(fn ($item)=>[
            'id'=>$item->id,
            'title'=>$item->tg_title,
            'start'=>$item->tg_tanggal_pelaksanaan,
            'end'=>$item->tg_tanggal_kembali
        ]);
        return response()->json($events);
    }
    public function kalenderGedungLap()
    {
        return view('GedungLap.kalender', [
            "title" => "Kalender Gedung Lapangan"
        ]);
    }
}
