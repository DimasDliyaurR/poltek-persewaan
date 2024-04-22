<?php

namespace App\Http\Controllers\transaksi;

use Exception;
use App\Models\TipeAsrama;
use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiAsrama;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Models\Asrama;
use App\Models\DetailTransaksiFasilitas;
use App\Models\FasilitasAsrama;
use App\Services\handler\Midtrans\CreateSnapTokenService;

class AsramaFeController extends Controller
{
    use HandlerPromo;
    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;
    private $inputPromo;

    public function index()
    {
        $gedung_lap = TipeAsrama::latest();
        if (request('search')) {
            $gedung_lap->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('kategori.penginapan', [
            "title" => "Gedung Lapangan",
            "gedung_lap" => $gedung_lap->paginate(3)
        ]);
    }

    public function pesanForm($slug)
    {
        $item = $slug;
        $item = Asrama::whereASlug($item)->first();
        if ($item == null) {
            abort(404);
        }
        $tipeAsrama = TipeAsrama::all();

        // $fasilitasAsrama = Asrama::with(["tipeAsrama" => ["fasilitasAsramas"]])->whereASlug($slug)->get();
        $fasilitasAsrama = Asrama::join("tipe_asramas", "asramas.tipe_asrama_id", "=", "tipe_asramas.id")->join("detail_fasilitas_asramas", "detail_fasilitas_asramas.tipe_asrama_id", "=", "tipe_asramas.id")->join("fasilitas_asramas", "detail_fasilitas_asramas.fasilitas_asrama_id", "=", "fasilitas_asramas.id")->where("detail_fasilitas_asramas.dfa_status", "pilihan")->whereASlug($slug)->get();

        return view("transaksi.asrama.pesan", [
            "title" => "Pesan Kendaraan",
            "tipeAsrama" => $tipeAsrama,
            "item" => $item,
            "fasilitasAsrama" => $fasilitasAsrama,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "ta_check_in" => "required",
            "ta_check_out" => "required",
            "slug" => "required",
        ]);
        $item = $request->slug;
        $this->inputPromo = $request->promo;
        $validation["fasilitas"] = $request->fasilitas;

        // Promo
        $promo = $this->handlerPromo("Gedung");

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

        $validation["fasilitas"] = $request->fasilitas;

        DB::transaction(function () use ($validation) {
            // Create Transaksi
            $transaksi = TransaksiAsrama::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "#300",
                "ta_check_in" => $validation["ta_check_in"],
                "ta_tanggal_sewa" => now(),
                "ta_check_out" => $validation["ta_check_out"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $asrama = Asrama::with("tipeAsrama")->where("a_slug", "=", $value)->first();
                $total_harga = $asrama->tipeAsrama->ta_tarif;

                $this->total_transaksi += $total_harga;

                DetailTransaksiAsrama::create([
                    "transaksi_asrama_id" => $transaksi->id,
                    "asrama_id" => $asrama->id,
                    "dta_harga" => $total_harga,
                ]);
            }
            // Store Detail Fasilitas Asrama Transaksi
            $total_transaksi_fasilitas = 0;
            foreach ($validation["fasilitas"] as $row => $value) {
                $fasilitasAsrama = FasilitasAsrama::where("fa_nama", "=", $value)->first();
                $total_harga = $fasilitasAsrama->fa_tarif;

                // Apakah Total Transaksi Fasilitas Di akumulasi kan dengan promo ?
                $total_transaksi_fasilitas += $total_harga;

                DetailTransaksiFasilitas::create([
                    "transaksi_asrama_id" => $transaksi->id,
                    "fasilitas_asrama_id" => $fasilitasAsrama->id,
                    "dtf_harga" => $total_harga,
                ]);
            }
        });

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

        $snapToken = $midtrans->getSnapToken();

        return view("transaksi.kendaraan.pembayaran", [
            "title" => "pembayaran",
            "snapToken" => $snapToken
        ]);
    }
}
