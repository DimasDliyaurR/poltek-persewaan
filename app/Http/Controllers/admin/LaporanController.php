<?php

namespace App\Http\Controllers\admin;

use App\Models\Asrama;
use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use stdClass;

class LaporanController extends Controller
{
    public function index()
    {
        $TransaksiGedung = TransaksiGedung::with(["gedungLap.paymentMethod"])->where("status", "terbayar")->get()->map(function ($q) {
            $arr = [];

            foreach ($q->gedungLap as $item) {
                $arr += [
                    "kategori" => "GedungLap",
                    "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                    "tanggal_sewa" => $q->tg_tanggal_sewa,
                    "nominal" => $q->tg_sub_total,
                ];
            }

            return $arr;
        })->toArray();


        $TransaksiAsrama = TransaksiAsrama::with(["asramas.tipeAsrama.paymentMethod"])->where("status", "terbayar")->get()->map(
            function ($q) {
                $arr = [];
                $arr += [
                    "kategori" => "Asrama",
                    "tanggal_sewa" => $q->ta_tanggal_sewa,
                    "nominal" => $q->ta_sub_total,
                ];

                foreach ($q->asramas as $asrama) {
                    $arr["metode"] = $asrama->tipeAsrama->paymentMethod->is_dp ? "DP" : "Lunas";
                    // $arr->metode = $asrama->tipeAsrama->paymentMethod->is_dp ? "DP" : "Lunas";
                }
                return $arr;
            }
        )->toArray();

        $TransaksiLayanan = TransaksiLayanan::with(["layanans.paymentMethod"])->where("status", "terbayar")->get()->map(
            function ($q) {
                $arr = [];
                foreach ($q->layanans as $item) {
                    $arr += [
                        "kategori" => "Layanan",
                        "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                        "tanggal_sewa" => $q->tl_tanggal_sewa,
                        "nominal" => $q->tl_sub_total,
                    ];
                }
                return $arr;
            }
        )->toArray();

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs.paymentMethod"])->where("status", "terbayar")->get()->map(
            function ($q) {
                $arr = [];
                $arr += [
                    "kategori" => "Alat Barang",
                    "metode" => $q->alatBarangs->paymentMethod->is_dp ? "DP" : "Lunas",
                    "tanggal_sewa" => $q->ta_tanggal_sewa,
                    "nominal" => $q->ta_sub_total,
                ];
                return $arr;
            }
        )->toArray();

        $TransaksiKendaraan = TransaksiKendaraan::with("kendaraans.merkKendaraan.paymentMethod")->where("status", "terbayar")->get()->map(
            function ($q) {
                $arr = [];
                $arr += [
                    "kategori" => "Kendaraan",
                    "tanggal_sewa" => $q->tk_tanggal_sewa,
                    "nominal" => $q->tk_sub_total,
                ];
                foreach ($q->kendaraans as $kendaraan) {
                    $arr["metode"] = $kendaraan->merkKendaraan->paymentMethod->is_dp ? "DP" : "Lunas";
                }
                return $arr;
            }
        )->toArray();

        $laporanKeuangan = array_merge($TransaksiAsrama, $TransaksiLayanan, $TransaksiAlatBarang, $TransaksiKendaraan, $TransaksiGedung);

        if (request("kategori")) {
            $laporanKeuangan = array_filter($laporanKeuangan, function ($q) {
                if ($q["kategori"] == request("kategori")) {
                    return $q;
                };
            });
        }

        $sum = 0;
        foreach ($laporanKeuangan as $item) {
            $sum += $item["nominal"];
        }


        return view("admin.laporan.lihat", [
            "title" => "Laporan Transaksi",
            "action" => "laporan",
            "laporanKeuangan" => $laporanKeuangan,
            "sum" => $sum,
        ]);
    }
}
