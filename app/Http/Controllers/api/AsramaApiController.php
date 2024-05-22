<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FormValidationHelper;

class AsramaApiController extends Controller
{
    use FormValidationHelper;
    private $modal;

    public function __construct(TransaksiAsrama $transaksiAsrama)
    {
        $this->modal = $transaksiAsrama;
    }
    public function validasi_form_transaksi_asrama(Request $request)
    {
        $slug = $request->slug;
        $pesanan = $request->check_in;
        $kembali = $request->check_out;

        if (!$request->isMethod("POST")) {
            return response()->json([
                "error" => true,
                "message" => "Internal Error",
            ], 505);
        }

        try {
            $target = strtotime($pesanan);
            $pesanan = strtotime($kembali);

            if ($this->checkSchedule("ta_check_in", "ta_check_out", $target, $pesanan)) {
                return response()->json([
                    "error" => true,
                    "message" => "Jadwal sudah ada",
                ], 403);
            }
        } catch (\Exception $th) {
            return response()->json([
                "error" => true,
                "message" => "Internal Error",
            ], 505);
        }

        return response()
            ->json([
                'success' => true,
            ]);
    }
}
