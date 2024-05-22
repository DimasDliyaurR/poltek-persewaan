<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use App\Models\TransaksiAlatBarang;

class LaporanTransaksiTerbayarTable extends Component
{
    public $reqBulan = 0;
    public $nextBulan = 0;

    public function removeBulan()
    {
        $this->nextBulan--;
    }

    public function addBulan()
    {
        $this->nextBulan++;
    }

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $tahun = Carbon::now()->year;
        $bulan = Carbon::now()->month;
        $this->nextBulan = (Carbon::now()->month + $this->nextBulan) < 0 ? 0 : $this->nextBulan;
        $this->reqBulan = ($bulan + $this->nextBulan) < 0 ? 12 : Carbon::now()->month + ($this->nextBulan);

        $search = request("search") ?? null;
        $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $this->reqBulan);

        $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]])->whereMonth('created_at', $this->reqBulan);

        $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $this->reqBulan);

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]])->whereMonth('created_at', $this->reqBulan);

        $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]])->whereMonth('created_at', $this->reqBulan);

        $semuaTransaksi = array_merge(
            $TransaksiAsrama->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Asrama",
                        "customer" => $q->user->profile->nama_lengkap,
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->ta_sub_total,
                        "status" => $q->status,
                    ];

                    foreach ($q->asramas as $asrama) {
                        $arr["metode"] = $asrama->tipeAsrama->paymentMethod->is_dp ? "DP" : "Lunas";
                    }
                    return $arr;
                }
            )->toArray(),
            $TransaksiLayanan->get()->map(
                function ($q) {
                    $arr = [];
                    foreach ($q->layanans as $item) {
                        $arr += [
                            "kategori" => "Layanan",
                            "customer" => $q->user->profile->nama_lengkap,
                            "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                            "tanggal_sewa" => $q->created_at,
                            "nominal" => $q->tl_sub_total,
                            "status" => $q->status,
                        ];
                    }
                    return $arr;
                }
            )->toArray(),
            $TransaksiAlatBarang->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Alat Barang",
                        "customer" => $q->user->profile->nama_lengkap,
                        "metode" => $q->alatBarangs[0]->paymentMethod->is_dp ? "DP" : "Lunas",
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->ta_sub_total,
                        "status" => $q->status,
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiKendaraan->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "kategori" => "Kendaraan",
                        "customer" => $q->users->profile->nama_lengkap,
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->tk_sub_total,
                        "status" => $q->status,
                    ];
                    foreach ($q->kendaraans as $kendaraan) {
                        $arr["metode"] = $kendaraan->merkKendaraan->paymentMethod->is_dp ? "DP" : "Lunas";
                    }
                    return $arr;
                }
            )->toArray(),
            $TransaksiGedung->get()->map(function ($q) {
                $arr = [];

                foreach ($q->gedungLap as $item) {
                    $arr += [
                        "kategori" => "GedungLap",
                        "customer" => $q->user->profile->nama_lengkap,
                        "metode" => $item->paymentMethod->is_dp ? "DP" : "Lunas",
                        "tanggal_sewa" => $q->created_at,
                        "nominal" => $q->tg_sub_total,
                        "status" => $q->status,
                    ];
                }

                return $arr;
            })->toArray()
        );

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

        // Search
        if (request("search")) {
            $laporanKeuangan = array_filter($laporanKeuangan, function ($q) {
                foreach ($q as $key => $value) {
                    if (strpos($value,  request("search"))) {
                        return $q;
                    }
                }
            });
        }

        // Request Kategori
        if (request("kategori")) {
            $laporanKeuangan = array_filter($laporanKeuangan, function ($q) {
                if ($q["kategori"] == request("kategori")) {
                    return $q;
                }
            });
        }

        $sum = 0;
        foreach ($laporanKeuangan as $item) {
            $sum += $item["nominal"];
        }

        $sumSemua = 0;
        foreach ($semuaTransaksi as $item) {
            $sumSemua += $item["nominal"];
        }

        return view('livewire.laporan-transaksi-terbayar-table', [
            "title" => "Laporan Transaksi",
            "action" => "laporan",
            "laporanKeuangan" => $laporanKeuangan,
            "semuaTransaksi" => $semuaTransaksi,
            "sum" => $sum,
            "sumSemua" => $sumSemua,
            "bulan" => Carbon::createFromDate($tahun, $this->reqBulan, 1)->isoFormat("MMMM Y"),
        ]);
    }
}
