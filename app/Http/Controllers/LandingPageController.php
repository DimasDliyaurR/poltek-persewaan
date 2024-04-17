<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function kalender()
    {
        return view('kalender');
    }

    public function listEvent(Request $request)
     {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = Event::where('tgl_mulai', '>=', $start)
            ->where('tgl_kembali', '<=', $end)
            ->get()
            ->map(function ($item){
                return[
                'id' => $item->id,
                'title' => $item->title,
                'start' => $item->tgl_mulai,
                'end' => $item->tgl_kembali,
                'category' => $item->category
                ];
                
            });
        
        $transaksiEvents = $this->getTransaksiEvents($start, $end);
        $events = $events->merge($transaksiEvents);
        return response()->json($events) ;
    }

    public function getTransaksiEvents($start, $end)
    {
        $transaksiKendaraan = DB::table('transaksi_kendaraans')
            ->select('tk_tanggal_sewa as start', 'tk_tanggal_kembali as end')
            ->where('tk_tanggal_sewa', '>=', $start)
            ->where('tk_tanggal_kembali', '<=', $end)
            ->get()
            ->toArray();
        $transaksiGedung = DB::table('transaksi_gedungs')
            ->select('tg_tanggal_sewa as start', 'tg_tanggal_kembali as end')
            ->where('tg_tanggal_sewa', '>=', $start)
            ->where('tg_tanggal_kembali','<=', $end)
            ->get()
            ->toArray();
        $transaksiAsrama = DB::table('transaksi_asramas')
            ->select('ta_check_in as start', 'ta_check_out as end')
            ->where('ta_check_in', '>=', $start)
            ->where('ta_check_out','<=', $end)
            ->get()
            ->toArray();
        $transaksiAlatBarang = DB::table('transaksi_alat_barangs')
            ->select('tab_tanggal_pesanan as start', 'tab_tanggal_kembali as end', DB::raw("'#FF5733' as color"))
            ->where('tab_tanggal_pesanan', '>=', $start)
            ->where('tab_tanggal_kembali','<=', $end)
            ->get()
            ->toArray();
        $transaksiLayanan = DB::table('transaksi_layanans')
            ->select('tl_tanggal_pelaksanaan as start', 'tl_tanggal_pelaksanaan as end',  DB::raw("'#FF5733' as color"))
            ->where('tl_tanggal_pelaksanaan', '>=', $start)
            ->where('tl_tanggal_pelaksanaan','<=', $end)
            ->get()
            ->toArray();
        
        $transaksiEvents = array_merge($transaksiKendaraan, $transaksiGedung, $transaksiAsrama, $transaksiAlatBarang, $transaksiLayanan);
        return $transaksiEvents;
    }

    public function promo()
    {
        $promo = Promo::all();
        $title  ="Home";
        return view('index', ['promo'=>$promo, 'title'=>$title]
    );
    }
}
