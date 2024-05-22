<?php

namespace App\Http\Controllers\api;

use App\Models\Kendaraan;
use App\Models\AlatBarang;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use App\Services\handler\Midtrans\Callback;
use App\Services\handler\Promo\PromoHandler;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Http\Controllers\Traits\FormValidationHelper;

class ApiController extends Controller
{
    private $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function getMerkKendaraanBySlug($slug)
    {
        $slugs = explode(",", $slug);
        $merkKendaraan = MerkKendaraan::with("kendaraans");

        foreach ($slugs as $key => $value) {
            $merkKendaraan->orWhere("mk_slug", $value);
        }

        return response()->json($merkKendaraan->get());
    }

    public function callback(Request $request)
    {
        // $notification = new Notification();

        $serverKey = config("midtrans.server_key");
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {

            $statusCode = $request->status_code;
            $transactionStatus = $request->transaction_status;
            $fraudStatus = !empty($request->fraud_status) ? ($request->fraud_status == 'accept') : true;

            $orderSplit = explode("-", $request->order_id);
            $model = $orderSplit[count($orderSplit) - 1];
            $modalTable = "transaksi_" . $model;
            $codeUnique = str_replace("-" . $model, "", $request->order_id);

            if (($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'))) {

                $item = DB::table($modalTable)->where('code_unique', $codeUnique)->update([
                    'status' => "terbayar",
                ]);

                if ($modalTable == "transaksi_alat_barangs") {
                    $transaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs"])->whereCodeUnique($codeUnique)->first();

                    foreach ($transaksiAlatBarang->alatBarangs as $alatBarang) {
                        AlatBarang::whereId($alatBarang->id)->update([
                            "ab_qty" => $alatBarang->a_qty - 1,
                        ]);
                    }
                } else if ($modalTable == "transaksi_kendaraans") {
                    $transaksiKendaraan = TransaksiKendaraan::with("kendaraans")->whereCodeUnique($codeUnique)->get();
                    foreach ($transaksiKendaraan as $item) {
                        foreach ($item->kendaraans as $kendaraan) {
                            $this->kendaraanService->updateKendaraan([
                                "status" => "tersedia"
                            ], $kendaraan->id);
                        }
                    }
                }
            } else if ($request->transaction_status == 'expire') {
                DB::table($modalTable)->where('code_unique', $codeUnique)->update([
                    'status' => "kadaluarsa",
                ]);
            } else if ($request->transaction_status == 'cancel') {
                DB::table($modalTable)->where('code_unique', $codeUnique)->update([
                    'status' => "batal",
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }

    public function cekPromo($promoCode, $kategori)
    {
        $checkPromo = false;
        $promo = new PromoHandler($promoCode, $kategori, true);

        // Apakah promo ada dan sesuai kategori
        if ($promo->isExist() && ($promo->isCategorySame() or $promo->isAppliesForAllCategories())) {
            // Apakah Promo Tidak Kadaluarsa dan Aktif
            if ((!$promo->isExpired()) && $promo->isActive()) {
                // Promo sudah terdeteksi
                $checkPromo = true;
            } else {
                return response()->json([
                    "error" => true,
                    "message" => "Promo tidak bisa digunakan",
                ], 403);
            }
        } else {
            return response()->json([
                "error" => true,
                "message" => "Promo tidak Valid",
            ], 403);
        }

        if ($checkPromo) {
            // Apakah Promo masih tersisa
            if (!($promo->getStok() > 0 or $promo->isStokUnlimited())) {
                return response()->json([
                    "error" => true,
                    "message" => "Promo sudah habis",
                ], 403);
            }
        } else {
            return response()->json([
                "error" => true,
                "message" => "Promo tidak valid",
            ], 403);
        }

        return response()
            ->json([
                'success' => true,
                'message' => 'Promo Berhasil',
            ]);
    }
}
