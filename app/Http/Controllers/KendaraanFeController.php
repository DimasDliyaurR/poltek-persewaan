<?php

namespace App\Http\Controllers;

use App\Http\Requests\kendaraan\RequestTransaksiKendaraan;
use Exception;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTransaksiKendaraan;
use App\Services\Kendaraan\KendaraanService;

class KendaraanFeController extends Controller
{
    protected $kendaraanService;

    // Inisisasi Variable Transaksi
    private $transaksi;

    private $total_transaksi = 0;

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

        return view('detail.detail_bus', [
            "title" => "Kendaraan",
            "kendaraan" => $kendaraans->first()
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = MerkKendaraan::whereMkSlug($item)->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "!=", "tersedia")])->first();
            $MerkKendaraan = MerkKendaraan::with("kendaraans")->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")])->get();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }

        return view("user_transaksi.kendaraan.pesan", [
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
            "tk_durasi" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;

        DB::transaction(function () use ($validation) {
            // Store Transaksi
            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "foto_sim" => auth()->user()->id . str_replace("-", "", $validation["tk_tanggal_sewa"]),
                "tk_durasi" => $validation["tk_durasi"],
                "tk_tanggal_sewa" => $validation["tk_tanggal_sewa"],
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
            // dd($this->total_transaksi);
        });

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config("midtrans.server_key");
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $this->transaksi->id,
                'gross_amount' => $this->total_transaksi,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->profile->nama_lengkap,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view("user_transaksi.kendaraan.pembayaran", [
            "title" => "pembayaran",
            "snapToken" => $snapToken
        ]);
    }
}
