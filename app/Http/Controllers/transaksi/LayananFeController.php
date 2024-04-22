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

    protected $inputPromo;

    public function index()
    {
        $layanan = Layanan::latest();
        if (request('search')) {
            $layanan->where('gl_nama', 'like', "%" . request('search') . "%")
                ->orWhere('gl_keterangan', 'like', '%' . request('search') . '%');
        }
        return view('kategori.layanan', [
            "title" => "Layanan",
            "layanan" => $layanan->paginate(3)
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

        return view("transaksi.layanan.pesan", [
            "title" => "Pesan Kendaraan",
            "layanan" => $layanan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tl_tanggal_sewa" => "required",
            "tl_tanggal_pelaksanaan" => "required",
            "tl_tujuan" => "required",
            "tl_durasi_sewa" => "required",
            "slug" => "required",
        ]);

        $item = $request->slug;

        // Promo
        $this->inputPromo = $request->promo;
        $promo = $this->handlerPromo($request, "Layanan");

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
            $transaksi = TransaksiLayanan::create([
                "user_id" => auth()->user()->id,
                "promo_id" => !($this->promo->isExist()) ? null : $this->promo->getPromo()->id,
                "code_unique" => auth()->user()->id . strtotime(now()) . "#200",
                "tl_tanggal_sewa" => now(),
                "tl_tanggal_pelaksanaan" => $validation["tl_tanggal_pelaksanaan"],
                "tl_durasi_sewa" => $validation["tl_durasi_sewa"],
                "tl_tujuan" => $validation["tl_tujuan"],
            ]);

            $this->transaksi = $transaksi;

            // Store Detail Transaksi
            foreach ($validation["slug"] as $row => $value) {
                $Layanan = Layanan::where("l_slug", "=", $value)->first();
                $total_harga = $Layanan->l_tarif;

                $this->total_transaksi += $total_harga;

                DetailTransaksiLayanan::create([
                    "transaksi_layanan_id" => $transaksi->id,
                    "layanan_id" => $Layanan->id,
                    "dtl_harga" => $total_harga,
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

        $snapToken = $midtrans->getSnapToken();

        return view("transaksi.kendaraan.pembayaran", [
            "title" => "pembayaran",
            "snapToken" => $snapToken
        ]);
    }
}
