<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FormValidationHelper;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Http\Request;

class KendaraanApiController extends Controller
{
    use FormValidationHelper;
    private $modal;

    public function __construct(TransaksiKendaraan $transaksiKendaraan)
    {
        $this->modal = $transaksiKendaraan;
    }

    /**
     * 
     * @param \Illuminate\Http\Request $request
     * Request = [slug,pelaksanaan,durasi]
     */
    public function validasi_form_transaksi_transportasi(Request $request)
    {
        $slug = $request->slug;
        $pelaksanaan = $request->pelaksanaan;
        $durasi = $request->durasi;
        $model_with_relation =  MerkKendaraan::withCount(["kendaraans as count" => fn ($q) => $q->whereKStatus("tersedia")])->whereMkSlug($slug)->get();

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

            if ($this->checkSchedule("tk_pelaksanaan", "tk_tanggal_kembali", $target, $pelaksanaan)) {
                return response()->json([
                    "error" => true,
                    "message" => "Jadwal sudah ada",
                ], 403);
            } else {
                if ($this->checkCapacity($model_with_relation)) {
                    return response()->json([
                        "error" => true,
                        "message" => "Kendaraan tidak tersedia",
                    ], 403);
                }
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
