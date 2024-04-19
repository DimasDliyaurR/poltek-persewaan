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

        DB::transaction(function () use ($validation) {
            // Store Transaksi
            $tanggal_sewa_unix = strtotime($validation["tk_tanggal_sewa"]);
            $tanggal_kembali_unix = strtotime($validation["tk_tanggal_kembali"]);
            $validation["tk_durasi"] = ($tanggal_kembali_unix - $tanggal_sewa_unix) / (24 * 60 * 60);

            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "code_unique" => auth()->user()->id . str_replace("-", "", $validation["tk_tanggal_sewa"]),
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

            if ($validation["promo"] != null) {
                $promo = new PromoHandler($validation["promo"], "Kendaraan");

                if ($promo->isExist() && $promo->isCategorySame()) {
                    if (!($promo->isExpired() && $promo->isActive())) {
                        if ($promo->isUserAlreadyUsing()) {
                            return redirect()->withErrors([
                                "promo" => "Promo sudah pernah digunakan",
                            ]);
                        }
                        $this->total_transaksi = $promo->total($this->total_transaksi);
                        $promo->decreaseStok();
                    } else {
                        return redirect()->withErrors([
                            "promo" => "Promo tidak bisa digunakan",
                        ]);
                    }
                }
            }
        });




        $data = array(
            'transaction_details' => array(
                'order_id' => $this->transaksi->code_unique,
                'gross_amount' => $this->total_transaksi,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->profile->nama_lengkap,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_telp,
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
