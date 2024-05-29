<?php

namespace App\Http\Controllers\api;

use App\Models\Asrama;
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
        $check_in = $request->check_in;
        $check_out = $request->check_out;

        $id = Asrama::whereASlug($slug)->first();

        if (!$request->isMethod("POST")) {
            return response()->json([
                "error" => true,
                "message" => "Internal Error",
            ], 505);
        }

        try {
            if ($this->checkScheduleAsrama($slug, $check_in, $check_out)) {
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
