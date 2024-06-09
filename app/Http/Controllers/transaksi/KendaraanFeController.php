<?php

namespace App\Http\Controllers\transaksi;

use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiKendaraan;
use App\Services\Kendaraan\KendaraanService;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Http\Controllers\Traits\FormValidationHelper;
use App\Models\RatingMerkKendaraan;
use App\Services\handler\Midtrans\CreateSnapTokenService;

class KendaraanFeController extends Controller
{
    use HandlerPromo, FormValidationHelper;

    protected $kendaraanService;

    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;
    private $snapToken;

    // Inisiasi 
    protected $inputPromo;

    public function __construct(KendaraanService $kendaraanService)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
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
        $kendaraans = MerkKendaraan::with(["kendaraans"])->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")->latest(), "rating"
        ])->where("mk_slug", "=", $slug)->first();

        if (!$kendaraans)
            abort(404);

        $ulasan = RatingMerkKendaraan::with("user")->withCount(["like as liked" => fn ($q) => $q->whereIsLike(1), "like as unlike" => fn ($q) => $q->whereIsLike(2)])->whereMerkKendaraanId($kendaraans->id)->get();
        return view('transportasi.detail', [
            "title" => "Transportasi",
            "kendaraan" => $kendaraans,
            "ulasan" => $ulasan,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tk_pelaksanaan" => "required",
            "tk_durasi" => "required",
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



        $inner = DB::transaction(function () use ($validation) {
            // Store Transaksi
            $pelaksanaan_unix = strtotime($validation["tk_pelaksanaan"]);
            $durasi = $validation["tk_durasi"];
            $validation["tk_tanggal_kembali"] = date("Y-m-d h:i:s", $pelaksanaan_unix + ($durasi * (60 * 60 * 24)));

            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "@100",
                "tk_durasi" => $validation["tk_durasi"],
                "tk_tanggal_sewa" => now(),
                "tk_pelaksanaan" => $validation["tk_pelaksanaan"],
                "tk_tanggal_kembali" => $validation["tk_tanggal_kembali"],
            ]);

            $this->transaksi = $transaksi;

            $MerkKendaraan = MerkKendaraan::with(["kendaraans" => fn ($q) => $q->where("k_status", "tersedia")->orderBy("k_urutan_prioritas", "asc"), "paymentMethod"]);
            foreach ($validation["slug"] as $row => $value) {
                $MerkKendaraan->where("mk_slug", "=", $value);
            }

            $MerkKendaraan = $MerkKendaraan->get();

            foreach ($MerkKendaraan as $item) {
                $total_harga = ($item->paymentMethod->is_dp ? $item->paymentMethod->tarif_dp : $item->mk_tarif) * $validation["tk_durasi"];

                $this->total_transaksi += $total_harga;

                if ($item->kendaraans->first()->id == null) {
                    return back()->with("error", "Kendaraan tidak tersedia");
                }

                $this->kendaraanService->updateKendaraan([
                    "k_status" => "tidak",
                ], $item->kendaraans->first()->id);


                DetailTransaksiKendaraan::create([
                    "transaksi_kendaraan_id" => $transaksi->id,
                    "kendaraan_id" => $item->kendaraans->first()->id,
                    "dtk_harga" => $total_harga,
                ]);
            }


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
                "tk_snap_token" => $this->snapToken,
                "tk_sub_total" => $this->total_transaksi,
            ]);
        });

        if ($inner != null) {
            return $inner;
        }

        return redirect()->route("transportasi.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiKendaraan::with(["kendaraans.merkKendaraan.paymentMethod", "promo",])->whereCodeUnique($codeUnique);

        if (!$detailTransaksi->exists()) {
            abort(404);
        }

        $detailTransaksi = $detailTransaksi->get();

        if ($detailTransaksi[0]->status == "terbayar") {
            return redirect()->route("invoice.transportasi", $detailTransaksi[0]->code_unique);
        }
        $sub_total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $tanggal_sewa_unix = strtotime($transaksi->tk_tanggal_sewa);
            $tanggal_kembali_unix = strtotime($transaksi->tk_tanggal_kembali);
            $durasi = intdiv(($tanggal_kembali_unix - $tanggal_sewa_unix), (24 * 60 * 60));

            foreach ($transaksi->kendaraans as $asrama) {
                $sub_total += $asrama->merkKendaraan->mk_tarif * $transaksi->tk_durasi;
            }

            $promo = $transaksi->promo != null ? (($transaksi->promo->p_tipe == "fixed") ?
                $transaksi->promo->p_isi : $sub_total * ($transaksi->promo->p_isi / 100)) : null;

            $snap_token = $transaksi->tk_snap_token;
            $total = $transaksi->tk_sub_total;
        }

        return view("transportasi.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
    public function listEventTransportasi(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiKendaraan::where('tk_pelaksanaan', '>=', $start)
            ->where('tk_tanggal_kembali', '<=', $end)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->tk_durasi,
                'start' => $item->tk_tanggal_pelaksanaan,
                'end' => $item->tk_tanggal_kembali
            ]);
        return response()->json($events);
    }

    public function kalender()
    {
        return view('transportasi.kalender', [
            "title" => "Kalender Transportasi"
        ]);
    }
}
