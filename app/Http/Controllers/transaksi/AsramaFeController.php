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
use App\Services\Asrama\AsramaService;
use App\Services\handler\Midtrans\CreateSnapTokenService;
use App\Services\handler\Promo\PromoHandler;

class AsramaFeController extends Controller
{
    use HandlerPromo;
    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;
    private $tarif = 0;
    private $inputPromo;
    private $total_transaksi_fasilitas = 0;

    private $snapToken;
    private $asramaService;

    public function __construct(AsramaService $asramaService)
    {
        $this->asramaService = $asramaService;
    }


    public function index()
    {
        $tipeAsrama = TipeAsrama::with("fasilitasAsramas")->withCount(['asramas' => fn ($q) => $q->whereAStatus("tersedia")])->latest();
        if (request('search')) {
            $tipeAsrama->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('asrama.index', [
            "title" => "Asrama",
            "tipeAsrama" => $tipeAsrama->paginate(3)
        ]);
    }


    public function detail($slug)
    {
        $tipeAsrama = TipeAsrama::with(["asramas" => fn ($q) => $q->whereAStatus("tersedia"), "detailFotoTipeAsrama", "fasilitasAsramas" => fn ($q) => $q->where("dfa_status", "pilihan")])->whereTaSlug($slug);
        if (!$tipeAsrama->first()) abort(404);

        return view('asrama.detail', [
            "title" => "Asrama",
            "tipeAsrama" => $tipeAsrama->first()
        ]);
    }

    public function listEventAsrama(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiAsrama::with(["asramas", "user" => ["profiles"]])->where('ta_check_in', '>=', $start)
            ->where('ta_check_out', '<=', $end)->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->asramas->a_nama . "-Asrama",
                'start' => $item->ta_check_in,
                'end' => $item->ta_check_out,
            ]);

        return response()->json($events);
    }

    public function kalenderAsrama()
    {
        return view('asrama.kalender', [
            "title" => "Kalender Asrama"
        ]);
    }

    // public function pesanForm($slug)
    // {
    //     $item = $slug;
    //     $item = Asrama::whereASlug($item)->first();
    //     // where a_slug
    //     if ($item == null) {
    //         abort(404);
    //     }
    //     $tipeAsrama = TipeAsrama::all();

    //     // $fasilitasAsrama = Asrama::with(["tipeAsrama" => ["fasilitasAsramas"]])->whereASlug($slug)->get();
    //     $fasilitasAsrama = Asrama::join("tipe_asramas", "asramas.tipe_asrama_id", "=", "tipe_asramas.id")->join("detail_fasilitas_asramas", "detail_fasilitas_asramas.tipe_asrama_id", "=", "tipe_asramas.id")->join("fasilitas_asramas", "detail_fasilitas_asramas.fasilitas_asrama_id", "=", "fasilitas_asramas.id")->where("detail_fasilitas_asramas.dfa_status", "pilihan")->whereASlug($slug)->get();
    //     return view("asrama.transaksi_pemesanan", [
    //         "title" => "Pesan Kendaraan",
    //         "tipeAsrama" => $tipeAsrama,
    //         "item" => $item,
    //         "fasilitasAsrama" => $fasilitasAsrama,
    //     ]);
    // }


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
        $promo = $this->handlerPromo("asramas");

        if ($promo == 1) {
            return back()->withInput()->withErrors([
                "promo" => "Promo tidak valid",
            ]);
        } elseif ($promo == 2) {
            return back()->withInput()->withErrors([
                "promo" => "Promo tidak bisa digunakan",
            ]);
        } elseif ($promo == 3) {
            return back()->with("error", "")->withInput()->withErrors([
                "promo" => "Promo sudah pernah digunakan",
            ]);
        }

        $validation["fasilitas"] = $request->fasilitas;

        DB::transaction(function () use ($validation) {
            $transaksi = TransaksiAsrama::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "@400",
                "ta_check_in" => $validation["ta_check_in"],
                "ta_tanggal_sewa" => now(),
                "ta_check_out" => $validation["ta_check_out"],
            ]);

            $this->transaksi = $transaksi;

            $asrama = Asrama::with(["tipeAsrama.paymentMethod"]);

            foreach ($validation["slug"] as $row => $value) {
                $asrama->where("a_slug", "=", $value);
            }

            // Store Detail Transaksi
            foreach ($asrama->get() as $row => $value) {
                $durasi_check_in_to_check_out = intdiv(strtotime($validation["ta_check_out"]) - strtotime($validation["ta_check_in"]), (24 * 60 * 60));

                $this->tarif = ($value->tipeAsrama->paymentMethod->is_dp ? $value->tipeAsrama->paymentMethod->tarif_dp : $value->tipeAsrama->ta_tarif);
                $total_harga = $this->tarif * $durasi_check_in_to_check_out;

                $this->total_transaksi += $total_harga;

                $this->asramaService->updateAsrama([
                    "a_status" => "tidak tersedia",
                ], $value->id);

                DetailTransaksiAsrama::create([
                    "transaksi_asrama_id" => $transaksi->id,
                    "asrama_id" => $value->id,
                    "dta_harga" => $total_harga,
                ]);
            }

            // Store Detail Fasilitas Asrama Transaksi
            if ($validation["fasilitas"] != null) {
                $fasilitas = new FasilitasAsrama();
                $count = 1;
                foreach ($validation["fasilitas"] as $key => $value) {
                    if ($count == 1) $fasilitas = $fasilitas::where("fa_nama", $value);
                    $count != 1 ? $fasilitas->orWhere("fa_nama", $value) : '';
                    $count++;
                }

                foreach ($fasilitas->get() as $value) {
                    $total_harga = $value->fa_tarif;

                    $this->total_transaksi_fasilitas += $total_harga;

                    DetailTransaksiFasilitas::create([
                        "transaksi_asrama_id" => $transaksi->id,
                        "fasilitas_asrama_id" => $value->id,
                        "dtf_harga" => $total_harga,
                    ]);
                }
                // Apakah Promo sudah terdeteksi
            }

            if ($this->checkPromo($this->tarif)) {
                return back()->withErrors([
                    "promo" => "Promo Sudah Habis"
                ]);
            }

            $data = array(
                'transaction_details' => array(
                    'order_id' => $this->transaksi->code_unique . "-asramas",
                    'gross_amount' => $this->total_transaksi + $this->total_transaksi_fasilitas,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->profile->nama_lengkap,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->profile->no_telp,
                ),
            );

            $midtrans = new CreateSnapTokenService($data);

            $this->snapToken = $midtrans->getSnapToken();

            $updateTransaksi = TransaksiAsrama::whereId($this->transaksi->id)->update([
                "ta_snap_token" => $this->snapToken,
                "ta_sub_total" => $this->total_transaksi + $this->total_transaksi_fasilitas
            ]);
        });

        return redirect()->route("asrama.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiAsrama::with(["asramas.tipeAsrama.paymentMethod", "fasilitasAsrama", "promo"])->whereCodeUnique($codeUnique);
        if (!$detailTransaksi->exists()) {
            abort(404);
        }

        $detailTransaksi = $detailTransaksi->get();

        $total = 0;
        $sub_total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $snap_token = $transaksi->ta_snap_token;
            $promo = $transaksi->promo;

            foreach ($transaksi->asramas as $asrama) {
                $sub_total += $asrama->tipeAsrama->ta_tarif;
            }

            $total += $transaksi->ta_sub_total;

            $promo = $promo != null ? (($transaksi->promo->p_tipe == "fixed") ?
                $transaksi->promo->p_isi : ($sub_total * ($transaksi->promo->p_isi / 100))) : null;
        }


        // dd($total);

        return view("asrama.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
}
