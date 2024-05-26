<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use App\Models\TransaksiAlatBarang;

class DashboardAdmin extends Component
{
    public $next = 1;
    public $batas = 0;

    public function nextStep()
    {
        $this->next++;
    }

    public function previousStep()
    {
        $this->next = $this->next <= 0 ? 1 : $this->next - 1;
    }

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $tahun = Carbon::now()->year;
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
                        "id" => $q->code_unique,
                        "kategori" => "Asrama",
                        "username" => $q->user->profile->nama_lengkap,
                        "role" => $q->user->level,
                        "nominal" => $q->ta_sub_total,
                        "status" => $q->status,
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiLayanan->get()->map(
                function ($q) {
                    $arr = [];
                    foreach ($q->layanans as $item) {
                        $arr += [
                            "id" => $q->code_unique,
                            "kategori" => "Layanan",
                            "username" => $q->user->profile->nama_lengkap,
                            "role" => $q->user->level,
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
                        "id" => $q->code_unique,
                        "kategori" => "Alat Barang",
                        "username" => $q->user->profile->nama_lengkap,
                        "metode" => $q->alatBarangs[0]->paymentMethod->is_dp ? "DP" : "Lunas",
                        "role" => $q->user->level,
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
                        "id" => $q->code_unique,
                        "kategori" => "Kendaraan",
                        "username" => $q->users->profile->nama_lengkap,
                        "role" => $q->users->level,
                        "nominal" => $q->tk_sub_total,
                        "status" => $q->status,
                    ];
                    return $arr;
                }
            )->toArray(),
            $TransaksiGedung->get()->map(function ($q) {
                $arr = [];

                foreach ($q->gedungLap as $item) {
                    $arr += [
                        "id" => $q->code_unique,
                        "kategori" => "GedungLap",
                        "username" => $q->user->profile->nama_lengkap,
                        "role" => $q->user->level,
                        "nominal" => $q->tg_sub_total,
                        "status" => $q->status,
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

        $total_halaman = ceil($jumlah_data / $this->batas);

        $transaksiWithLimit = [];
        while ($halaman_awal < $halaman_akhir) {
            $transaksiWithLimit[] = $semuaTransaksi[$halaman_awal];
            $halaman_awal++;
        }

        $sumSemua = 0;
        foreach ($semuaTransaksi as $item) {
            $sumSemua += $item["nominal"];
        }
        return view('livewire.dashboard-admin', [
            "sum" => $sumSemua,
            "transaksi_semua" => $semuaTransaksi,
            "transaksi" => $transaksiWithLimit,

        ]);
    }
}
