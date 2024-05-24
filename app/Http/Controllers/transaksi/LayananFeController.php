<?php

namespace App\Http\Controllers\transaksi;

use Exception;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\TransaksiLayanan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiLayanan;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Services\handler\Midtrans\CreateSnapTokenService;

class LayananFeController extends Controller
{
    use HandlerPromo;
    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;

    protected $snapToken;
    protected $inputPromo;

    public function index()
    {
        $layanans = new Layanan();
        if (request('search')) {
            $layanans->where('l_nama', 'like', '%' . request('search') . '%');
        }
        return view('layanan.index', [
            "title" => "Layanan",
            "layanan" => $layanans->paginate(6)

        ]);
    }

    public function detail($slug)
    {
        $layanan = Layanan::with("detailFotoLayanans")->whereLSlug($slug)->first();
        if (!$layanan)
            abort(404);
        return view('layanan.detail', [
            "title" => "Detail Gedung",
            "layanan" => $layanan
        ]);
    }

    public function listEventLayanan(Request $request)
    {
        $start =  date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiLayanan::where('tl_tanggal_pelaksanaan', '>=', $start)
            ->where('tl_tanggal_selesai', '<=', $end)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->tl_title,
                'start' => $item->tl_tanggal_pelaksanaan,
                'end' => $item->tl_tanggal_selesai
            ]);
        return response()->json($events);
    }

    public function kalenderLayanan()
    {
        return view('layanan.kalender', [
            "title" => "Kalender Layanan"
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = Layanan::whereLSlug($item)->first();
            $layanan = Layanan::all();
        } catch (Exception $th) {
            throw new Exception($th->getMessage());
        }

        return view("layanan.transaksi_pesan", [
            "title" => "Pesan Kendaraan",
            "layanan" => $layanan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            "tl_tanggal_pelaksanaan" => "required",
            "tl_durasi_sewa" => "required",
            "tl_tujuan" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;

        // Promo
        $this->inputPromo = $request->promo;
        $promo = $this->handlerPromo("layanans");

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

        $transaction = DB::transaction(function () use ($validation) {

            $pelaksanaan_unix = strtotime($validation["tl_tanggal_pelaksanaan"]);
            $durasi = $validation["tl_durasi_sewa"];
            $validation["tl_tanggal_kembali"] = date("Y-m-d h:i:s", $pelaksanaan_unix + ($durasi * (60 * 60 * 24)));

            $transaksi = TransaksiLayanan::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "@200",
                "tl_tanggal_sewa" => now(),
                "tl_durasi_sewa" => $validation["tl_durasi_sewa"],
                "tl_tanggal_kembali" => $validation["tl_tanggal_kembali"],
                "tl_tanggal_pelaksanaan" => $validation["tl_tanggal_pelaksanaan"],
                "tl_tujuan" => $validation["tl_tujuan"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $Layanan = Layanan::with("paymentMethod")->where("l_slug", "=", $value)->first();
                $total_harga = $Layanan->paymentMethod->is_dp ? $Layanan->paymentMethod->tarif_dp : $Layanan->l_tarif;

                $this->total_transaksi += $total_harga;

                DetailTransaksiLayanan::create([
                    "transaksi_layanan_id" => $transaksi->id,
                    "layanan_id" => $Layanan->id,
                    "dtl_harga" => $total_harga,
                ]);
            }
            // Apakah Promo sudah terdeteksi
            if ($this->checkPromo())
                back()->withErrors([
                    "promo" => "Promo Sudah Habis"
                ]);

            $data = array(
                'transaction_details' => array(
                    'order_id' => $this->transaksi->code_unique . "-layanans",
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

            TransaksiLayanan::whereId($this->transaksi->id)->update([
                "tl_snap_token" => $this->snapToken,
                "tl_sub_total" => $this->total_transaksi
            ]);
        });

        if ($transaction)
            $transaction;


        return redirect()->route("layanan.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiLayanan::with(["layanans.paymentMethod", "promo",])->whereCodeUnique($codeUnique)->get();
        if ($detailTransaksi[0]->status == "terbayar") {
            return redirect()->route("invoice.layanan", $detailTransaksi[0]->code_unique);
        }
        $sub_total = 0;

        // dd($detailTransaksi);

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            $sub_total = $transaksi->tl_sub_total;

            $snap_token = $transaksi->tl_snap_token;
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

        return view("layanan.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "subTotal" => $sub_total,
        ]);
    }
}
