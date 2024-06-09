<?php

namespace App\Http\Controllers\transaksi;

use App\Models\AlatBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiAlatBarang;
use App\Http\Controllers\Controller;
use App\Models\DetailTransaksiAlatBarang;
use App\Http\Controllers\Traits\HandlerPromo;
use App\Services\handler\Midtrans\CreateSnapTokenService;

class AlatBarangFeController extends Controller
{
    use HandlerPromo;
    // Inisiasi Transaksi
    private $transaksi;
    private $total_transaksi = 0;
    private $tarif = 0;
    private $inputPromo;
    private $snapToken;

    public function index()
    {
        $alatbarang = AlatBarang::with(['satuanAlatBarangs', 'fotoAlatBarangs'])->latest();
        if (request('search')) {
            $alatbarang->WHERE('a_nama', 'like', '%' . request('search') . '%');
        }

        return view('alatBarang.index', [
            "title" => "Alat Barang",
            "alatBarangs" => $alatbarang->paginate(6),
        ]);
    }

    public function detail($slug)
    {
        $alatbarang = AlatBarang::with("fotoAlatBarangs")->whereAbSlug($slug)->first();
        if (!$alatbarang)
            abort(404);

        return view('alatBarang.detail', [
            "title" => "Alat Barang",
            "alatBarangs" => $alatbarang,
        ]);
    }

    public function kalenderAlatBarang()
    {
        return view('alatBarang.kalender', [
            "title" => 'Kalender Alat Barang'
        ]);
    }

    public function listEventAb(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $events = TransaksiAlatBarang::where('tab_tanggal_pesanan', '>=', $start)
            ->where('tab_tanggal_kembali', '<=', $end)->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'title' => $item->tab_keterangan,
                'start' => $item->tab_tanggal_pesanan,
                'end' => $item->tab_tanggal_kembali,
            ]);

        return response()->json($events);
    }

    public function pesanForm($slug)
    {
        $item = $slug;
        $item = AlatBarang::whereAbSlug($item)->first();
        if ($item == null) {
            abort(404);
        }

        return view("alatBarang.transaksi_pesan", [
            "title" => "Pesan Asrama",
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tab_tanggal_pesanan" => "required",
            "tab_tanggal_kembali" => "required",
            "tab_qty" => "required",
            "tab_keterangan" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;
        $this->inputPromo = $request->promo;

        // Promo
        $promo = $this->handlerPromo("alat_barangs");

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
            // Create Transaksi
            $transaksi = TransaksiAlatBarang::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "@400",
                "tab_tanggal_pesanan" => $validation["tab_tanggal_pesanan"],
                "tab_tanggal_kembali" => $validation["tab_tanggal_kembali"],
                "tab_qty" => $validation["tab_qty"],
                "tab_keterangan" => $validation["tab_keterangan"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            $alatBarang = AlatBarang::with("paymentMethod");
            foreach ($validation["slug"] as $value) {
                $alatBarang->where("ab_slug", "=", $value);
            }

            foreach ($alatBarang->get() as $barang) {
                $durasi = intdiv(strtotime($validation["tab_tanggal_kembali"]) - strtotime($validation["tab_tanggal_pesanan"]), (60 * 60 * 24));
                $this->tarif = $barang->paymentMethod->is_dp ? $barang->paymentMethod->tarif_dp : $barang->ab_tarif;
                $total_harga = ($this->tarif * $validation["tab_qty"]) * $durasi;

                $this->total_transaksi += $total_harga;

                DetailTransaksiAlatBarang::create([
                    "transaksi_alat_barang_id" => $transaksi->id,
                    "alat_barang_id" => $barang->id,
                    "dta_harga" => $total_harga,
                ]);
            }

            // Apakah Promo sudah terdeteksi
            if ($this->checkPromo($this->tarif)) {
                return back()->withErrors([
                    "promo" => "Promo Sudah Habis"
                ]);
            }

            $data = array(
                'transaction_details' => array(
                    'order_id' => $this->transaksi->code_unique . "-alat_barangs",
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

            TransaksiAlatBarang::whereId($this->transaksi->id)->update([
                "tab_snap_token" => $this->snapToken,
                "tab_sub_total" => $this->total_transaksi
            ]);
        });

        if ($transaction) $transaction;

        return redirect()->route("alat-barang.pembayaran", $this->transaksi->code_unique);
    }

    public function pembayaran($codeUnique)
    {
        $detailTransaksi = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod", "satuanAlatBarangs"], "promo",])->whereCodeUnique($codeUnique);

        if (!$detailTransaksi->exists()) {
            abort(404);
        }

        $detailTransaksi = $detailTransaksi->get();

        if ($detailTransaksi[0]->status == "terbayar") {
            return redirect()->route("invoice.alatBarang", $detailTransaksi[0]->code_unique);
        }
        $sub_total = 0;
        $total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            foreach ($transaksi->alatBarangs as $alatBarang) {
                $sub_total += $alatBarang->ab_tarif;
            }
            $promo = $promo != null ? (($transaksi->promo->p_tipe == "fixed") ?
                $transaksi->promo->p_isi : ($sub_total * ($transaksi->promo->p_isi / 100))) : null;

            $snap_token = $transaksi->tab_snap_token;
            $total += $transaksi->tab_sub_total;
        }


        return view("alatBarang.transaksi_invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
}
