<?php

namespace App\Http\Controllers\api;

use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Models\AlatBarang;
use App\Models\TransaksiAlatBarang;
use App\Services\handler\Midtrans\Callback;
use App\Services\handler\Promo\PromoHandler;

class ApiController extends Controller
{
    public function getMerkKendaraanBySlug($slug)
    {
        $slugs = explode(",", $slug);
        $merkKendaraan = MerkKendaraan::with("kendaraans");

        foreach ($slugs as $key => $value) {
            $merkKendaraan->orWhere("mk_slug", $value);
        }

        return response()->json($merkKendaraan->get());
    }

    public function callback()
    {
        $callback = new Callback();

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();
            $category = "transaksi_" . $callback->model;

            if ($callback->isSuccess()) {
                $item = DB::table($category)->where('code_unique', $order->id)->update([
                    'status' => "terbayar",
                ]);
                if ($category == "transaksi_alat_barangs") {
                    $transaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs"])->whereCodeUnique($order->id)->first();
                    AlatBarang::find($transaksiAlatBarang->alatBarangs->id)->update([
                        "a_qty" => $transaksiAlatBarang->alatBarangs->a_qty - 1
                    ]);
                }
            }

            if ($callback->isExpire()) {
                DB::table($category)->where('code_unique', $order->id)->update([
                    'status' => "kadaluarsa",
                ]);
            }

            if ($callback->isCancelled()) {
                DB::table($category)->where('code_unique', $order->id)->update([
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
