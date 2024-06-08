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

    protected $snapToken;
    protected $inputPromo;

    public function index()
    {
        $gedung_lap = GedungLap::latest();
        if (request('search')) {
            $gedung_lap->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }

        return view('GedungLap.index', [
            "title" => "Gedung Lapangan",
            "gedung_lap" => $gedung_lap->paginate(3)
        ]);
    }

    public function detail($slug)
    {
        $gedung_lap = GedungLap::with("detailFotoGedungLap")->whereGlSlug($slug)->first();
        if (!$gedung_lap)
            abort(404);

        $gedungSplit = explode(",", $gedung_lap->gl_satuan_gedung[0] == "," ? substr($gedung_lap->gl_satuan_gedung, 1, strlen($gedung_lap->gl_satuan_gedung)) : $gedung_lap->gl_satuan_gedung);

        return view('gedungLap.detail', [
            "title" => "Gedung",
            "gedung_lap" => $gedung_lap,
            "gedungSplit" => $gedungSplit,
        ]);
    }

    public function pesanForm($slug)
    {
        $item = $slug;
        $item = GedungLap::whereGlSlug($item)->first();
        $MerkKendaraan = GedungLap::all();

        return view("gedung.transaksi_pesan", [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tg_tanggal_pelaksanaan" => "required",
            "satuan" => "required",
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

        $transaction = DB::transaction(function () use ($validation, $request) {
            // // Create Transaksi
            $transaksi = TransaksiGedung::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "@300",
                "tg_tujuan" => $validation["tg_tujuan"],
                "tg_tanggal_sewa" => now(),
                "tg_tanggal_pelaksanaan" => $validation["tg_tanggal_pelaksanaan"],
                "tg_tanggal_kembali" => $request->tg_tanggal_kembali,
                "tg_jam_mulai" => $request->tg_jam_mulai,
                "tg_jam_akhir" => $request->tg_jam_akhir,
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            $gedungLap = GedungLap::with("paymentMethod");
            foreach ($validation["slug"] as $row => $value) {
                $gedungLap->where("gl_slug", "=", $value);
            }

            foreach ($gedungLap->get() as $gedung) {
                if ($validation["satuan"] == "jam") {
                    $durasi_jam = intdiv(strtotime($request->tg_jam_akhir) - strtotime($request->tg_jam_mulai), (60 * 60));
                    dd($durasi_jam);
                    $total_harga = $gedung->paymentMethod->is_dp ? $gedung->paymentMethod->tarif_dp : $gedung->gl_tarif;
                }
                $this->total_transaksi += $total_harga;

                DetailTransaksiGedung::create([
                    "transaksi_gedung_id" => $transaksi->id,
                    "gedung_lap_id" => $gedung->id,
                    "dtg_harga" => $total_harga,
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

            $this->snapToken = $midtrans->getSnapToken();


            TransaksiGedung::whereId($this->transaksi->id)->update([
                "tg_snap_token" => $this->snapToken,
                "tg_sub_total" => $this->total_transaksi
            ]);
        });

        if ($transaction)
            $transaction;

        return redirect()->route("gedung.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiGedung::with(["gedungLap.paymentMethod", "promo",])->whereCodeUnique($codeUnique);

        if (!$detailTransaksi->exists()) {
            abort(404);
        }

        $detailTransaksi = $detailTransaksi->get();

        if ($detailTransaksi[0]->status == "terbayar") {
            return redirect()->route("invoice.gedungLap", $detailTransaksi[0]->code_unique);
        }
        $sub_total = 0;
        $total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            foreach ($transaksi->gedungLap as $gedung) {
                $sub_total += $gedung->gl_tarif;
            }
            $promo = $promo != null ? (($transaksi->promo->p_tipe == "fixed") ?
                $sub_total - $transaksi->promo->p_isi : $sub_total - ($sub_total * ($transaksi->promo->p_isi / 100))) : null;

            $snap_token = $transaksi->tg_snap_token;
            $total += $transaksi->tg_sub_total;
        }




        return view("gedungLap.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
}
