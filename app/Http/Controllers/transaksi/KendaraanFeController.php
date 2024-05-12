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
    private $snapToken;

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
                "code_unique" => auth()->user()->id . strtotime(now()) . "@100",
                "tk_durasi" => $validation["tk_durasi"],
                "tk_tanggal_sewa" => now(),
                "tk_tanggal_kembali" => $validation["tk_tanggal_kembali"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $MerkKendaraan = MerkKendaraan::with("paymentMethod")->where("mk_slug", "=", $value)->first();
                $total_harga = ($MerkKendaraan->paymentMethod->is_dp ? $MerkKendaraan->paymentMethod->tarif_dp : $MerkKendaraan->mk_tarif) * $validation["tk_durasi"];

                $this->total_transaksi += $total_harga;

                DetailTransaksiKendaraan::create([
                    "transaksi_kendaraan_id" => $transaksi->id,
                    "kendaraan_id" => $MerkKendaraan->id,
                    "dtk_harga" => $total_harga,
                ]);
            }
            // Apakah Promo sudah terdeteksi
            if ($this->checkPromo()) {
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

            $this->snapToken = $midtrans->getSnapToken();

            TransaksiKendaraan::whereId($transaksi->id)->update([
                "snap_token" => $this->snapToken,
                "tk_sub_total" => $this->total_transaksi,
            ]);
        });

        return redirect()->route("transportasi.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiKendaraan::with(["kendaraans.merkKendaraan.paymentMethod", "promo",])->whereCodeUnique($codeUnique)->get();
        $sub_total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            $tanggal_sewa_unix = strtotime($transaksi->tk_tanggal_sewa);
            $tanggal_kembali_unix = strtotime($transaksi->tk_tanggal_kembali);
            $durasi = intdiv(($tanggal_kembali_unix - $tanggal_sewa_unix), (24 * 60 * 60));

            foreach ($transaksi->kendaraans as $asrama) {
                $sub_total += $asrama->merkKendaraan->mk_tarif;
            }
            $snap_token = $transaksi->snap_token;
            $total = $transaksi->sub_total;
        }

        $promo = $promo != null ? ($detailTransaksi->promo->tipe == "fixed") ?
            $sub_total - $this->promo->p_isi : $sub_total - ($sub_total * ($this->promo->p_isi / 100)) : null;

        // dd([
        //     "title" => "pembayaran",
        //     "snapToken" => $snap_token,
        //     "detailTransaksi" => $detailTransaksi,
        //     "totalPromo" => $promo,
        //     "total" => $total,
        // ]);

        return view("transportasi.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
}
