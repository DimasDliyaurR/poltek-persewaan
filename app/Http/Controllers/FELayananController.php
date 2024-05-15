<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\TransaksiAlatBarang;
use App\Models\TransaksiLayanan;

class FELayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::get();
        if (request('search')) {
            $layanans->where('l_nama', 'like', '%' . request('search') . '%');
        }
        return view('layanan.index', [
            "title" => "Layanan",
            "layanan" => $layanans->paginate(6)

        ]);
    }
    public function listEventLayanan(Request $request)
    {
        $start =  date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiLayanan::where('tl_tanggal_pelaksanaan', '>=', $start)
            ->where('tl_tanggal_selesai', '<=', $end)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->tl_title,
                'start' => $item->tl_tanggal_pelaksanaan,
                'end' => $item->tl_tanggal_selesai
            ]);
        return response()->json($events);
    }

    public function kalenderLayanan()
    {
        return view('layanan.kalender', [
            "title" => "Kalender Layanan"
        ]);
    }
}
