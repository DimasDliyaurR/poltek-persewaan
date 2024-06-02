<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FormValidationHelper;
use App\Models\TransaksiGedung;

class GedungLapApiController extends Controller
{
    use FormValidationHelper;
    private $modal;

    public function __construct(TransaksiGedung $transaksiGedung)
    {
        $this->modal = $transaksiGedung;
    }

    public function validasi_form_transaksi_gedung_lap(Request $request)
    {
        $slug = $request->slug;
        $pesanan = $request->tg_tanggal_pelaksanaan;
        $kembali = $request->tg_tanggal_kembali;

        if (!$request->isMethod("POST")) {
            return response()->json([
                "error" => true,
                "message" => "Internal Error",
            ], 505);
        }

        // try {

        if ($this->checkScheduleGedungLap($slug, $pesanan, $kembali)) {
            return response()->json([
                "error" => true,
                "message" => "Jadwal sudah ada",
            ], 403);
        }
        // } catch (\Exception $th) {
        //     return response()->json([
        //         "error" => true,
        //         "message" => "Internal Error",
        //     ], 505);
        // }

        return response()
            ->json([
                'success' => true,
            ]);
    }
}
