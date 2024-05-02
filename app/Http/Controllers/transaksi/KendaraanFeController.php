<?php

namespace App\Http\Controllers\transaksi;

use Exception;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Models\DetailTransaksiKendaraan;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Requests\kendaraan\RequestTransaksiKendaraan;
use App\Services\handler\Midtrans\CreateSnapTokenService;
use App\Services\handler\Promo\PromoHandler;

class KendaraanFeController extends Controller
{
    use HandlerPromo;

    protected $kendaraanService;

    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;

    // Inisiasi 
    protected $inputPromo;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $transportasi = MerkKendaraan::with("kendaraans")->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")->latest()
        ]);
        if (request('search')) {
            $transportasi->where('mk_seri', 'like', '%' . request('search') . '%');
        }
        return view('transportasi.index', [
            "title" => "Transportasi",
            "transportasi" => $transportasi->paginate(6),
        ]);
    }

    public function detail($slug)
    {
        $kendaraans = MerkKendaraan::with("kendaraans")->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")->latest()
        ])->where("mk_slug", "=", $slug);

        return view('transportasi.detail', [
            "title" => "Transportasi",
            "kendaraan" => $kendaraans->first()
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = MerkKendaraan::whereMkSlug($item)->withCount([
                "kendaraans" => fn ($q) => $q->where("k_status", "!=", "tersedia")
            ]);
            $MerkKendaraan = MerkKendaraan::with("kendaraans")->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")])->get();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }

        return view("transportasi.transaksi_pesan", [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan->first(),
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
        $this->inputPromo = $request->promo;
        $promo = $this->handlerPromo("kendaraans");

        if ($promo == 1) {
            return back()->withInput()->withErrors([
                "promo" => "Promo tidak valid",
            ]);
        } elseif ($promo == 2) {
            return back()->withInput()->withErrors([
                "promo" => "Promo tidak bisa digunakan",
            ]);
        } elseif ($promo == 3) {
            return back()->withInput()->withErrors([
                "promo" => "Promo sudah pernah digunakan",
            ]);
        }


        DB::transaction(function () use ($validation) {
            // Store Transaksi
            $tanggal_sewa_unix = strtotime($validation["tk_tanggal_sewa"]);
            $tanggal_kembali_unix = strtotime($validation["tk_tanggal_kembali"]);
            $validation["tk_durasi"] = intdiv(($tanggal_kembali_unix - $tanggal_sewa_unix), (24 * 60 * 60));

            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "#100",
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
        if (!$this->checkPromo()) {
            return back()->withErrors([
                "promo" => "Promo Sudah Habis"
            ]);
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
