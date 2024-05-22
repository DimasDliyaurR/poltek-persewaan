<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FormValidationHelper;
use App\Models\Layanan;
use App\Models\TransaksiLayanan;

class LayananApiController extends Controller
{
    use FormValidationHelper;
    private $modal;

    public function __construct(TransaksiLayanan $transaksiKendaraan)
    {
        $this->modal = $transaksiKendaraan;
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * Request = [slug,pelaksanaan,durasi]
     */
    public function validasi_form_transaksi_layanan(Request $request)
    {
        $slug = $request->slug;
        $pelaksanaan = $request->pelaksanaan;
        $durasi = $request->durasi;

        if (!$request->isMethod("POST")) {
            return response()->json([
                "error" => true,
                "message" => "Wrong method",
            ], 403);
        }

        try {
            $pelaksanaan = strtotime($pelaksanaan);
            $target = strtotime($pelaksanaan) + ($durasi * (60 * 60 * 24));
            // dd($target, $pelaksanaan);

            if ($this->checkSchedule("tl_tanggal_pelaksanaan", "tl_tanggal_kembali", $target, $pelaksanaan)) {
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
