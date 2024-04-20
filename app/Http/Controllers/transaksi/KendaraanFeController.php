<?php

namespace App\Http\Controllers\transaksi;

use Exception;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiKendaraan;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Requests\kendaraan\RequestTransaksiKendaraan;
use App\Services\handler\Midtrans\CreateSnapTokenService;
use App\Services\handler\Promo\PromoHandler;

class KendaraanFeController extends Controller
{
    protected $kendaraanService;

    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;

    // Inisiasi Promo
    private $promo;
    private $checkPromo = false;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $kendaraans = MerkKendaraan::with("kendaraans")->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")
        ]);

        return view('kategori.transportasi', [
            "title" => "Kendaraan",
            "kendaraans" => $kendaraans->get()
        ]);
    }

    public function detail($slug)
    {
        $kendaraans = MerkKendaraan::with("kendaraans")->where("mk_slug", "=", $slug);

        return view('detail.detail_kendaraan', [
            "title" => "Kendaraan",
            "kendaraan" => $kendaraans->first()
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = MerkKendaraan::whereMkSlug($item)->withCount([
                "kendaraans" => fn ($q) => $q->where("k_status", "!=", "tersedia")
            ])->first();
            $MerkKendaraan = MerkKendaraan::with("kendaraans")->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")])->get();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }

        return view("transaksi.kendaraan.pesan", [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tk_tanggal_sewa" => "required",
            "tk_tanggal_kembali" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;
        $validation["promo"] = $request->promo;
        $validation["created_at"] = $request->created_at;
        $this->promo = new PromoHandler($validation["promo"], "Kendaraan");

        // Cek Isi Promo
        if ($validation["promo"] != null) {
            // Apakah promo ada dan sesuai kategori
            if ($this->promo->isExist() && ($this->promo->isCategorySame() or $this->promo->isAppliesForAllCategories())) {
                // Apakah Promo Tidak Kadaluarsa dan Aktif
                if (!(!($this->promo->isExpired()) && $this->promo->isActive())) {
                    // Apakah Promo sudah digunakan oleh user
                    if ($this->promo->isUserAlreadyUsing()) {
                        return back()->withInput()->withErrors([
                            "promo" => "Promo sudah pernah digunakan",
                        ]);
                    }
                    // Promo sudah terdeteksi
                    $this->checkPromo = true;
                } else {
                    return back()->withInput()->withErrors([
                        "promo" => "Promo tidak bisa digunakan",
                    ]);
                }
            } else {
                return back()->withInput()->withErrors([
                    "promo" => "Promo tidak valid",
                ]);
            }
        }

        DB::transaction(function () use ($validation) {
            // Store Transaksi
            $tanggal_sewa_unix = strtotime($validation["tk_tanggal_sewa"]);
            $tanggal_kembali_unix = strtotime($validation["tk_tanggal_kembali"]);
            $validation["tk_durasi"] = intdiv(($tanggal_kembali_unix - $tanggal_sewa_unix), (24 * 60 * 60));

            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()),
                "tk_durasi" => $validation["tk_durasi"],
                "tk_tanggal_sewa" => now(),
                "tk_tanggal_kembali" => $validation["tk_tanggal_kembali"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $MerkKendaraan = MerkKendaraan::where("mk_slug", "=", $value)->first();
                $total_harga = $MerkKendaraan->mk_tarif * $validation["tk_durasi"];

                $this->total_transaksi += $total_harga;

                DetailTransaksiKendaraan::create([
                    "transaksi_kendaraan_id" => $transaksi->id,
                    "kendaraan_id" => $MerkKendaraan->id,
                    "dtk_harga" => $total_harga,
                ]);
            }
        });

        // Apakah Promo sudah terdeteksi
        if ($this->checkPromo) {
            // Apakah Promo masih tersisa
            if ($this->promo->getStok() > 0) {
                // Perhitungan Promo dengan Subtotal
                $this->total_transaksi = $this->promo->total($this->total_transaksi);
                // Pengurangan Kapasitas Promo
                $this->promo->decreaseStok();
            } else {
                return back()->withErrors([
                    "promo" => "Promo Sudah Habis"
                ]);
            }
        }

        $data = array(
            'transaction_details' => array(
                'order_id' => $this->transaksi->code_unique . "-kendaraans",
                'gross_amount' => $this->total_transaksi,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->profile->nama_lengkap,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->profile->no_telp,
            ),
        );

        $midtrans = new CreateSnapTokenService($data);

        $snapToken = $midtrans->getSnapToken();

        return view("transaksi.kendaraan.pembayaran", [
            "title" => "pembayaran",
            "snapToken" => $snapToken
        ]);
    }
}
