<?php

namespace App\Livewire;

use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;

class DashboardAdmin extends Component
{
    public $next = 1;
    public $batas = 0;
    public $year = 0;
    public $yearPointer = 0;
    public $transaksi_count = 0;

    public function nextYear()
    {
        $this->yearPointer += 1;
    }
    public function previousYear()
    {
        $this->yearPointer -= 1;
    }

    public function nextStep()
    {
        $this->next =   $this->next >= $this->transaksi_count ? $this->next : $this->next + 1;
    }

    public function previousStep()
    {
        $this->next = $this->next <= 1 ? 1 : $this->next - 1;
    }

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $bulan = Carbon::now()->month;

        $search = request("search") ?? null;
        $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]]);

        $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]]);

        $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]]);

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]]);

        $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]]);

        $semuaTransaksi = array_merge(
            $TransaksiAsrama->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "id" => $q->id,
                        "code_unique" => $q->code_unique,
                        "kategori" => "Asrama",
                        "username" => $q->user->profile->nama_lengkap,
                        "role" => $q->user->level,
                        "nominal" => $q->ta_sub_total,
                        "status" => $q->status,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiLayanan->get()->map(
                function ($q) {
                    $arr = [];
                    foreach ($q->layanans as $item) {
                        $arr += [
                            "id" => $q->id,
                            "code_unique" => $q->code_unique,
                            "kategori" => "Layanan",
                            "username" => $q->user->profile->nama_lengkap,
                            "role" => $q->user->level,
                            "nominal" => $q->tl_sub_total,
                            "status" => $q->status,
                            "tanggal_pembayaran" => $q->tanggal_transaksi
                        ];
                    }
                    return $arr;
                }
            )->toArray(),
            $TransaksiAlatBarang->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "id" => $q->id,
                        "code_unique" => $q->code_unique,
                        "kategori" => "Alat Barang",
                        "username" => $q->user->profile->nama_lengkap,
                        "metode" => $q->alatBarangs[0]->paymentMethod->is_dp ? "DP" : "Lunas",
                        "role" => $q->user->level,
                        "nominal" => $q->ta_sub_total,
                        "status" => $q->status,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiKendaraan->get()->map(
                function ($q) {
                    $arr = [];
                    $arr += [
                        "id" => $q->id,
                        "code_unique" => $q->code_unique,
                        "kategori" => "Kendaraan",
                        "username" => $q->users->profile->nama_lengkap,
                        "role" => $q->users->level,
                        "nominal" => $q->tk_sub_total,
                        "status" => $q->status,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiGedung->get()->map(function ($q) {
                $arr = [];

                foreach ($q->gedungLap as $item) {
                    $arr += [
                        "id" => $q->id,
                        "code_unique" => $q->code_unique,
                        "kategori" => "GedungLap",
                        "username" => $q->user->profile->nama_lengkap,
                        "role" => $q->user->level,
                        "nominal" => $q->tg_sub_total,
                        "status" => $q->status,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                }

                return $arr;
            })->toArray()
        );

        // Pagination
        $this->batas = 5;
        $halaman_awal = ($this->next > 1) ? ($this->next * $this->batas) - $this->batas : 0;
        $jumlah_data = count($semuaTransaksi);

        $halaman_akhir = $jumlah_data <
            ($this->batas * (($this->next > 1) ? $this->next : 1))
            ? $jumlah_data
            : ($this->batas * (($this->next > 1) ? $this->next : 1));

        $transaksiWithLimit = [];
        while ($halaman_awal < $halaman_akhir) {
            $transaksiWithLimit[] = $semuaTransaksi[$halaman_awal];
            $halaman_awal++;
        }
        $this->transaksi_count = count($transaksiWithLimit);

        // Transaksi belum bayar
        $transaksiBelumBayar = array_filter($semuaTransaksi, fn ($q) => $q["status"] == "belum bayar");

        // Transaksi sudah bayar
        $transaksiSudahBayar = array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar");

        $sumSemua = 0;
        foreach ($transaksiSudahBayar as $item) {
            $sumSemua += $item["nominal"];
        }

        /*
        |----------------------------------------------------------------------------------
        |                                   LAPORAN QUERY                                 |
        |----------------------------------------------------------------------------------
        */

        // Year
        $this->year = Carbon::now()->year + $this->yearPointer;

        // Month
        $startMonth = Carbon::create(date('Y'), 1, 1);
        $endMonth = $startMonth->copy()->addYear();

        $months = [];
        $period = new DatePeriod($startMonth, new DateInterval('P1M'), $endMonth->addMonth());
        foreach ($period as $date) {
            $months[$date->format('Y-m')] = 0;
        }
        $months = array_slice($months, 0, count($months) - 1);

        $TransaksiGedung = $TransaksiGedung->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tg_sub_total) as total")
        )
            ->whereYear('created_at', $this->year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAsrama = $TransaksiAsrama->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(ta_sub_total) as total")
        )
            ->whereYear('created_at', $this->year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiLayanan = $TransaksiLayanan->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tl_sub_total) as total")
        )
            ->whereYear('created_at', $this->year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAlatBarang = $TransaksiAlatBarang->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tab_sub_total) as total")
        )
            ->whereYear('created_at', $this->year)->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiKendaraan = $TransaksiKendaraan->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tk_sub_total) as total")
        )
            ->whereYear('created_at', $this->year)->where("status", "terbayar")
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

        $currentMonth = Carbon::create(date("Y"), 1, 20);
        $categories = [];

        for ($i = 0; $i <    12; $i++) {
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


        return view('livewire.dashboard-admin', [
            "sum" => $sumSemua,
            "transaksi_semua" => $semuaTransaksi,
            "transaksiSudahBayar" => $transaksiSudahBayar,
            "transaksiBelumBayar" => $transaksiBelumBayar,
            "transaksi" => $transaksiWithLimit,
            "transaksi_laporan" => $transaksi,
        ]);
    }
}
