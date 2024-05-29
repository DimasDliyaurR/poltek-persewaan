<?php

namespace App\Http\Controllers\admin;

use stdClass;
use Carbon\Carbon;
use App\Models\Asrama;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use App\Services\Transaksi\TransaksiService;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    private $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $this->transaksiService = $transaksiService;
    }

    public function pemasukan()
    {
        if (request("pdf") == 1) {
            setlocale(LC_TIME, 'id_ID');
            \Carbon\Carbon::setLocale('id');
            \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

            $tahun = Carbon::now()->year;
            $bulan = Carbon::now()->month;
            $reqBulan = request("bulan");
            $search = request("search") ?? null;
            $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $reqBulan)->whereYear('created_at', $tahun);

            $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]])->whereMonth('created_at', $reqBulan)->whereYear('created_at', $tahun);

            $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $reqBulan)->whereYear('created_at', $tahun);

            $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $reqBulan)->whereYear('created_at', $tahun);

            $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]])->whereMonth('created_at', $reqBulan)->whereYear('created_at', $tahun);



            /**
             * ================================ MAPPING ================================
             */
            $TransaksiGedung = $TransaksiGedung->where("status", "terbayar")->get()->map(function ($q) {
                $arr = [];

                foreach ($q->gedungLap as $item) {
                    $arr += [
                        "kategori" => "GedungLap",
                        "customer" => $q->user->profile->nama_lengkap,
                        "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->tg_sub_total,
                    ];
                }

                return $arr;
            })->toArray();

            $TransaksiAsrama = $TransaksiAsrama->where("status", "terbayar")->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Asrama",
                        "customer" => $q->user->profile->nama_lengkap,
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->ta_sub_total,
                    ];

                    foreach ($q->asramas as $asrama) {
                        $arr["metode"] = $asrama->tipeAsrama->paymentMethod->is_dp ? "DP" : "Lunas";
                    }
                    return $arr;
                }
            )->toArray();

            $TransaksiLayanan = $TransaksiLayanan->where("status", "terbayar")->get()->map(
                function ($q) {
                    $arr = [];
                    foreach ($q->layanans as $item) {
                        $arr += [
                            "kategori" => "Layanan",
                            "customer" => $q->user->profile->nama_lengkap,
                            "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                            "tanggal_sewa" => $q->created_at,
                            "nominal" => $q->tl_sub_total,
                        ];
                    }
                    return $arr;
                }
            )->toArray();

            $TransaksiAlatBarang = $TransaksiAlatBarang->where("status", "terbayar")->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Alat Barang",
                        "customer" => $q->user->profile->nama_lengkap,
                        "metode" => $q->alatBarangs[0]->paymentMethod->is_dp ? "DP" : "Lunas",
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->tab_sub_total,
                    ];
                    return $arr;
                }
            )->toArray();

            $TransaksiKendaraan = $TransaksiKendaraan->where("status", "terbayar")->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Kendaraan",
                        "customer" => $q->users->profile->nama_lengkap,
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->tk_sub_total,
                    ];
                    foreach ($q->kendaraans as $kendaraan) {
                        $arr["metode"] = $kendaraan->merkKendaraan->paymentMethod->is_dp ? "DP" : "Lunas";
                    }
                    return $arr;
                }
            )->toArray();


            $laporanKeuangan = array_merge($TransaksiAsrama, $TransaksiLayanan, $TransaksiAlatBarang, $TransaksiKendaraan, $TransaksiGedung);
            $sum = 0;
            foreach ($laporanKeuangan as $item) {
                $sum += $item["nominal"];
            }

            $pdf = Pdf::loadView("admin.laporan.pdf", [
                "laporanKeuangan" => $laporanKeuangan,
                "sum" => $sum,
            ]);

            return $pdf->download("laporan_pemasukan_" . Carbon::now()->isoFormat("d MMMM Y") . ".pdf");
        }
        return view("admin.laporan.lihat", [
            "title" => "Laporan Pemasukan",
            "action" => "laporan",
        ]);
    }

    public function indexTransaksiKendaraan()
    {
        try {
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.kendaraan.lihat", [
            "title" => "Transaksi Kendaraan",
            "action" => "laporan",
        ]);
    }

    public function indexTransaksiLayanan()
    {
        try {
            $transaksiLayanan = $this->transaksiService->getAllTransaksiLayanan();
            if (request("pdf") == 1) {
                $pdf =  Pdf::loadView("admin.laporan.layanan.pdf", [
                    "transaksiLayanan" => $transaksiLayanan->get()
                ]);
                return $pdf->download("transaksi_layanan_" . Carbon::now()->isoFormat("D-MMMM-Y") . ".pdf");
            }
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.layanan.lihat", [
            "title" => "Transaksi Layanan",
            "action" => "laporan",
            "transaksiLayanan" => $transaksiLayanan->paginate(5),
        ]);
    }

    public function indexTransaksiGedungLap()
    {

        return view("admin.laporan.gedungLap.lihat", [
            "title" => "Transaksi Gedung dan Lapangan",
            "action" => "laporan",
        ]);
    }

    public function indexTransaksiAsrama()
    {

        return view("admin.laporan.asrama.lihat", [
            "title" => "Transaksi Asrama",
            "action" => "laporan",
        ]);
    }

    public function indexTransaksiAlatBarang()
    {

        return view("admin.laporan.alatBarang.lihat", [
            "title" => "Transaksi Alat Barang",
            "action" => "laporan",
        ]);
    }

    public function showTransaksiKendaraan($id)
    {
        try {
            $transaksiKendaraan = $this->transaksiService->getDataByIdTransaksiKendaraan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.kendaraan.detail", [
            "title" => "Transaksi Kendaraan",
            "action" => "laporan",
            "transaksiKendaraan" => $transaksiKendaraan->first(),
        ]);
    }

    public function showTransaksiLayanan($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiLayanan($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.layanan.detail", [
            "title" => "Transaksi Layanan",
            "action" => "laporan",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }

    public function showTransaksiGedungLap($id)
    {
        try {
            $transaksiLayanan = $this->transaksiService->getDataByIdTransaksiGedungLap($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.gedungLap.detail", [
            "title" => "Transaksi Gedung dan Lapangan",
            "action" => "laporan",
            "transaksiLayanan" => $transaksiLayanan,
        ]);
    }

    public function showTransaksiAsrama($id)
    {
        try {
            $transaksiAsrama = $this->transaksiService->getDataByIdTransaksiAsrama($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.asrama.detail", [
            "title" => "Transaksi Asrama",
            "action" => "laporan",
            "transaksiAsrama" => $transaksiAsrama->first(),
        ]);
    }

    public function showTransaksiAlatBarang($id)
    {
        try {
            $transaksiAlatBarang = $this->transaksiService->getDataByIdTransaksiAlatBarang($id);
        } catch (\Exception $th) {
            throw new InvalidArgumentException();
        }

        return view("admin.laporan.alatBarang.detail", [
            "title" => "Transaksi Alat Barang",
            "action" => "laporan",
            "transaksiAlatBarang" => $transaksiAlatBarang->first(),
        ]);
    }
}
