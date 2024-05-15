<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asrama;
use App\Models\TransaksiAsrama;

class FEAsramaController extends Controller
{
    public function index () 
    {
        $asramas = Asrama::latest();
        if(request('search')) {
            $asramas->where('a_nama_ruangan', 'like', '%' . request('search').'%');
        }
        return view('asrama.index', [
            "title" => "Asrama", 
            "asrama" => $asramas->paginate(6)
        ]);
    }
    public function listEventAsrama(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiAsrama::where('ta_check_in', '>=' , $start)
        ->where('ta_check_out' ,'<=' , $end)->get()
        ->map(fn ($item) => [
            'id' => $item->id,
            'title' => $item->ta_title,
            'start' => $item->ta_check_in,
            'end' => $item->ta_check_out,
        ]);

        return response()->json($events);
    }
    public function kalenderAsrama ()
    {
        
        return view('asrama.kalender', [
            "title" => "Kalender Asrama"
        ]);
    }
}
