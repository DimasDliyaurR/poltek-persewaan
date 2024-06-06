<?php

namespace App\Http\Controllers\user;

use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use App\Services\User\UserService;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use App\Models\Promo;

class DashboardUserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]])->whereUserId(auth()->user()->id);

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
                        "created_at" => $q->created_at,
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
                            "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                }

                return $arr;
            })->toArray()
        );

        $pengeluaran = 0;
        foreach ($semuaTransaksi as $transaksi) {
            $pengeluaran += $transaksi["nominal"];
        }

        $terbayar = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar"));
        $tidak_terbayar = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "tidak terbayar"));

        // usort($semuaTransaksi, function ($a, $b) {
        //     return strtotime($b["tanggal_pembayaran"]) + strtotime($a["tanggal_pembayaran"]);
        // });

        $dates = [];
        foreach ($semuaTransaksi as $key => $row) {
            $dates[$key] = strtotime($row["created_at"]);
        }

        array_multisort($dates, SORT_DESC, $semuaTransaksi);

        /*
        |----------------------------------------------------------------------------------
        |                                   LAPORAN QUERY                                 |
        |----------------------------------------------------------------------------------
        */

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
            ->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAsrama = $TransaksiAsrama->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(ta_sub_total) as total")
        )
            ->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiLayanan = $TransaksiLayanan->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tl_sub_total) as total")
        )
            ->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiAlatBarang = $TransaksiAlatBarang->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tab_sub_total) as total")
        )
            ->where("status", "terbayar")
            ->groupBy("month")
            ->orderBy('month')->get()->toArray();

        $TransaksiKendaraan = $TransaksiKendaraan->select(
            DB::raw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as month"),
            DB::raw("SUM(tk_sub_total) as total")
        )
            ->where("status", "terbayar")
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

        return view('user.dash', [
            "title" => "Dashboard",
            "semuaTransaksi" => $semuaTransaksi,
            "pengeluaran" => $pengeluaran,
            "terbayar" => $terbayar,
            "tidak_terbayar" => $tidak_terbayar,
            "chart" => $transaksi,
        ]);
    }

    public function profile()
    {
        return view('user.profile', [
            "title" => "Dashboard"
        ]);
    }

    public function pesanan()
    {
        $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]])->whereUserId(auth()->user()->id);

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
                        "created_at" => $q->created_at,
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
                            "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
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
                        "kategori" => "Transportasi",
                        "username" => $q->users->profile->nama_lengkap,
                        "role" => $q->users->level,
                        "nominal" => $q->tk_sub_total,
                        "status" => $q->status,
                        "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                }

                return $arr;
            })->toArray()
        );

        $pengeluaran = 0;
        foreach ($semuaTransaksi as $transaksi) {
            $pengeluaran += $transaksi["nominal"];
        }

        $terbayar = array_filter($semuaTransaksi, function ($q) {
            return $q["status"] == "terbayar";
        });

        usort($terbayar, function ($a, $b) {
            return strtotime($b["tanggal_pembayaran"]) - strtotime($a["tanggal_pembayaran"]);
        });

        $tidakTerbayar = array_filter($semuaTransaksi, function ($q) {
            return $q["status"] == "belum bayar";
        });

        usort($tidakTerbayar, function ($a, $b) {
            return strtotime($b["tanggal_pembayaran"]) - strtotime($a["tanggal_pembayaran"]);
        });

        $kadaluarsa = array_filter($semuaTransaksi, function ($q) {
            return $q["status"] == "kadaluarsa";
        });

        usort($kadaluarsa, function ($a, $b) {
            return strtotime($b["tanggal_pembayaran"]) - strtotime($a["tanggal_pembayaran"]);
        });

        usort($semuaTransaksi, function ($a, $b) {
            return strtotime($b["tanggal_pembayaran"]) - strtotime($a["tanggal_pembayaran"]);
        });

        return view('user.riwayat_pesanan', [
            "title" => "Dashboard",
            "terbayar" => $terbayar,
            "tidakTerbayar" => $tidakTerbayar,
            "kadaluarsa" => $kadaluarsa,
        ]);
    }

    public function invoice()
    {
        $TransaksiGedung = TransaksiGedung::with(["gedungLap" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAsrama = TransaksiAsrama::with(["asramas" => ["tipeAsrama" => ["paymentMethod"]], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiLayanan = TransaksiLayanan::with(["layanans" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiAlatBarang = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod"], "user" => ["profile"]])->whereUserId(auth()->user()->id);

        $TransaksiKendaraan = TransaksiKendaraan::with(["kendaraans" => ["merkKendaraan" => ["paymentMethod"]], "users" => ["profile"]])->whereUserId(auth()->user()->id);

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
                        "created_at" => $q->created_at,
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
                            "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
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
                        "kategori" => "Transportasi",
                        "username" => $q->users->profile->nama_lengkap,
                        "role" => $q->users->level,
                        "nominal" => $q->tk_sub_total,
                        "status" => $q->status,
                        "created_at" => $q->created_at,
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
                        "created_at" => $q->created_at,
                        "tanggal_pembayaran" => $q->tanggal_transaksi
                    ];
                }

                return $arr;
            })->toArray()
        );

        $transportasi = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar" && $q["kategori"] == "Transportasi"));
        $asrama = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar" && $q["kategori"] == "Asrama"));
        $alat_barang = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar" && $q["kategori"] == "Alat Barang"));
        $layanan = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar" && $q["kategori"] == "Layanan"));
        $gedung_lap = count(array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar" && $q["kategori"] == "GedungLap"));

        return view('user.riwayat_invoice', [
            "title" => "Dashboard",
            "transportasi" => $transportasi,
            "asrama" => $asrama,
            "alat_barang" => $alat_barang,
            "layanan" => $layanan,
            "gedung_lap" => $gedung_lap,
            "semuaTransaksi" => array_filter($semuaTransaksi, fn ($q) => $q["status"] == "terbayar"),
        ]);
    }

    public function voucher()
    {
        $voucher = Promo::join("detail_user_promos as dps", "dps.promo_id", "=", "promos.id")
            ->join("users", "users.id", "=", "dps.user_id")
            ->where("dps.user_id", auth()->user()->id)
            ->get(["promos.p_judul", "promos.p_kategori", "promos.p_isi", "promos.p_tipe", "dps.*"]);

        return view('user.riwayat_voucher', [
            "title" => "Dashboard",
            "voucher" => $voucher
        ]);
    }
}
