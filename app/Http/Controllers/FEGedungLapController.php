<?php

namespace App\Http\Controllers;

use App\Models\GedungLap;
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
}
