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
    private $inputPromo;

    public function index()
    {
        $alatBarang = AlatBarang::latest();
        if (request('search')) {
            $alatBarang->where('ab_nama', 'like', "%" . request('search') . "%")
                ->orWhere('ab_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('kategori.penginapan', [
            "title" => "Alat Barang",
            "alatBarang" => $alatBarang->paginate(5)
        ]);
    }

    public function pesanForm($slug)
    {
        $item = $slug;
        $item = AlatBarang::whereAbSlug($item)->first();
        if ($item == null) {
            abort(404);
        }

        return view("transaksi.alatBarang.pesan", [
            "title" => "Pesan Asrama",
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tab_tanggal_pesanan" => "required",
            "tab_tanggal_kembali" => "required",
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

        DB::transaction(function () use ($validation) {
            // Create Transaksi
            $transaksi = TransaksiAlatBarang::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "#400",
                "tab_tanggal_pesanan" => $validation["tab_tanggal_pesanan"],
                "tab_tanggal_sewa" => now(),
                "tab_tanggal_kembali" => $validation["tab_tanggal_kembali"],
                "tab_keterangan" => $validation["tab_keterangan"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $alatBarang = AlatBarang::where("ab_slug", "=", $value)->first();
                $total_harga = $alatBarang->ab_tarif;

                $this->total_transaksi += $total_harga;

                DetailTransaksiAlatBarang::create([
                    "transaksi_alat_barang_id" => $transaksi->id,
                    "alat_barang_id" => $alatBarang->id,
                    "dta_harga" => $total_harga,
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
                'order_id' => $this->transaksi->code_unique . "-asramas",
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
