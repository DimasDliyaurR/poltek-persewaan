<?php

namespace App\Http\Controllers\transaksi;

use Exception;
use App\Models\GedungLap;
use Illuminate\Http\Request;
use App\Models\TransaksiGedung;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Models\DetailTransaksiGedung;
use App\Services\handler\Promo\PromoHandler;
use App\Services\handler\Midtrans\CreateSnapTokenService;

class GedungFeController extends Controller
{
    use HandlerPromo;
    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;

    protected $inputPromo;

    public function index()
    {
        $gedung_lap = GedungLap::latest();
        if (request('search')) {
            $gedung_lap->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('kategori.gedung', [
            "title" => "Gedung Lapangan",
            "gedung_lap" => $gedung_lap->paginate(3)
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = GedungLap::whereGlSlug($item)->first();
            $MerkKendaraan = GedungLap::all();
        } catch (\Exception $th) {
            throw new Exception($th->getMessage());
        }

        return view("transaksi.gedung.pesan", [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tg_tanggal_sewa" => "required",
            "tg_tanggal_kembali" => "required",
            "tg_tujuan" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;

        // Promo
        $this->inputPromo = $request->promo;
        $promo = $this->handlerPromo("gedung_laps");

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
            // Create Transaksi
            $transaksi = TransaksiGedung::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "#300",
                "tg_tujuan" => $validation["tg_tujuan"],
                "tg_tanggal_sewa" => now(),
                "tg_tanggal_kembali" => $validation["tg_tanggal_kembali"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $gedungLap = GedungLap::where("gl_slug", "=", $value)->first();
                $total_harga = $gedungLap->gl_tarif;

                $this->total_transaksi += $total_harga;

                DetailTransaksiGedung::create([
                    "transaksi_gedung_id" => $transaksi->id,
                    "gedung_lap_id" => $gedungLap->id,
                    "dtg_harga" => $total_harga,
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
                'order_id' => $this->transaksi->code_unique . "-gedungs",
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
