<?php

namespace App\Http\Controllers\api;

use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Kendaraan;
use App\Models\AlatBarang;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
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
                    'tanggal_transaksi' => now(),
                ]);
            } else if ($request->transaction_status == 'expire') {
                DB::table($modalTable)->where('code_unique', $codeUnique)->update([
                    'status' => "kadaluarsa",
                ]);
                if ($modalTable == "transaksi_alat_barangs") {
                    $transaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs"])->whereCodeUnique($codeUnique)->first();

                    foreach ($transaksiAlatBarang->alatBarangs as $alatBarang) {
                        AlatBarang::whereId($alatBarang->id)->update([
                            "ab_qty" => $alatBarang->a_qty + 1,
                        ]);
                    }
                }
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

    public function getAllTransaksi()
    {

        $year = \Carbon\Carbon::now()->year;

        // Month
        $currentMonth = Carbon::now();
        $endMonth = $currentMonth->copy()->addYear();

        $months = [];
        $period = new DatePeriod($currentMonth, new DateInterval('P1M'), $endMonth->addMonth());
        foreach ($period as $date) {
            $months[$date->format('Y-m')] = 0;
        }
        $months = array_slice($months, 0, count($months) - 1);


        $TransaksiGedung = TransaksiGedung::select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tg_sub_total) as total")
        )
            ->whereYear('created_at', $year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAsrama = TransaksiAsrama::select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(ta_sub_total) as total")
        )
            ->whereYear('created_at', $year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiLayanan = TransaksiLayanan::select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tl_sub_total) as total")
        )
            ->whereYear('created_at', $year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAlatBarang = TransaksiAlatBarang::select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tab_sub_total) as total")
        )
            ->whereYear('created_at', $year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiKendaraan = TransaksiKendaraan::select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tk_sub_total) as total")
        )
            ->whereYear('created_at', $year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $monthGedung = $months;
        foreach ($TransaksiGedung as $transaction) {
            $monthGedung[$transaction["month"]] = $transaction["total"];
        }

        $monthLayanan = $months;
        foreach ($TransaksiLayanan as $transaction) {
            $monthLayanan[$transaction["month"]] = $transaction["total"];
        }

        $monthAsrama = $months;
        foreach ($TransaksiAsrama as $transaction) {
            $monthAsrama[$transaction["month"]] = $transaction["total"];
        }

        $monthKendaraan = $months;
        foreach ($TransaksiKendaraan as $transaction) {
            $monthKendaraan[$transaction["month"]] = $transaction["total"];
        }

        $monthAlatBarang = $months;
        foreach ($TransaksiAlatBarang as $transaction) {
            $monthAlatBarang[$transaction["month"]] = $transaction["total"];
        }

        $TransaksiGedung = array_values($monthGedung);
        $TransaksiLayanan = array_values($monthLayanan);
        $TransaksiAsrama = array_values($monthAsrama);
        $TransaksiKendaraan = array_values($monthKendaraan);
        $TransaksiAlatBarang = array_values($monthAlatBarang);

        $TransaksiGedungArray = [
            "name" => "Gedung & Lapangan",
            "data" => count($TransaksiGedung) !== 0 ? $TransaksiGedung : [0],
            "color" => "#e9f542"
        ];

        $TransaksiAsramaArray = [
            "name" => "Asrama",
            "data" => count($TransaksiAsrama) !== 0 ? $TransaksiAsrama : [0],
            "color" => "#4287f5"
        ];

        $TransaksiLayananArray = [
            "name" => "Layanan",
            "data" => count($TransaksiLayanan) !== 0 ? $TransaksiLayanan : [0],
            "color" => "#1fd8db"
        ];

        $TransaksiAlatBarangArray = [
            "name" => "Alat Barang",
            "data" => count($TransaksiAlatBarang) !== 0 ? $TransaksiAlatBarang : [0],
            "color" => "#1A56DB"
        ];

        $TransaksiKendaraanArray = [
            "name" => "Kendaraan",
            "data" => count($TransaksiKendaraan) !== 0 ? $TransaksiKendaraan : [0],
            "color" => "#7E3BF2"
        ];

        $currentMonth = Carbon::now();
        $categories = [];

        for ($i = 0; $i < 12; $i++) {
            $categories[] = $currentMonth->copy()->isoFormat('MMMM');
            $currentMonth->addRealMonth();
        }

        $transaksi = [
            "date" => [
                $TransaksiAlatBarangArray,
                $TransaksiAsramaArray,
                $TransaksiKendaraanArray,
                $TransaksiGedungArray,
                $TransaksiLayananArray,
            ],
            "categories" => $categories
        ];

        return response()->json($transaksi);
    }
}
