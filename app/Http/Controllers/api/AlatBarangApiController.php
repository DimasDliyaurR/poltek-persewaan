<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FormValidationHelper;
use App\Models\AlatBarang;
use App\Models\TransaksiAlatBarang;
use Illuminate\Http\Request;

class AlatBarangApiController extends Controller
{
    use FormValidationHelper;
    private $modal;

    public function __construct(TransaksiAlatBarang $transaksiAlatBarang)
    {
        $this->modal = $transaksiAlatBarang;
    }

    public function validasi_form_transaksi_alat_barang(Request $request)
    {
        $slug = $request->slug;
        $pesanan = $request->tab_tanggal_pesanan;
        $kembali = $request->tab_tanggal_kembali;
        $model_with_relation =  AlatBarang::select("ab_qty as count")->get();

        if (!$request->isMethod("POST")) {
            return response()->json([
                "error" => true,
                "message" => "Internal Error",
            ], 505);
        }

        try {
            if ($this->checkScheduleAlatBarang($slug, $pesanan, $kembali)) {
                return response()->json([
                    "error" => true,
                    "message" => "Jadwal sudah ada",
                ], 403);
            } else {
                if ($this->checkCapacity($model_with_relation)) {
                    return response()->json([
                        "error" => true,
                        "message" => "Alat barang tidak tersedia",
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
