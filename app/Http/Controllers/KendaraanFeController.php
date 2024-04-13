<?php

namespace App\Http\Controllers;

use App\Http\Requests\kendaraan\RequestTransaksiKendaraan;
use Exception;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTransaksiKendaraan;
use App\Services\Kendaraan\KendaraanService;

class KendaraanFeController extends Controller
{
    protected $kendaraanService;
    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $kendaraans = MerkKendaraan::with("kendaraans")->withCount([
            "kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")
        ]);

        return view('kategori.transportasi', [
            "title" => "Kendaraan",
            "kendaraans" => $kendaraans->get()
        ]);
    }

    public function detail($slug)
    {
        $kendaraans = MerkKendaraan::with("kendaraans")->where("mk_slug", "=", $slug);

        return view('detail.detail_bus', [
            "title" => "Kendaraan",
            "kendaraan" => $kendaraans->first()
        ]);
    }

    public function pesanForm($slug)
    {
        try {
            $item = $slug;
            $item = MerkKendaraan::whereMkSlug($item)->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "!=", "tersedia")])->first();
            $MerkKendaraan = MerkKendaraan::with("kendaraans")->withCount(["kendaraans" => fn ($q) => $q->where("k_status", "=", "tersedia")])->get();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }

        return view("user_transaksi.kendaraan.pesan", [
            "title" => "Pesan Kendaraan",
            "merkKendaraan" => $MerkKendaraan,
            "item" => $item,
        ]);
    }

    public function pesan(Request $request)
    {
        $validation = $request->validate([
            "tk_tanggal_sewa" => "required",
            "tk_tanggal_kembali" => "required",
            "tk_durasi" => "required",
        ]);
        $item = $request->slug;

        DB::transaction(function () use ($validation) {
            // Store Transaksi
            $tanggal_sewa = strtotime($request->tanggal_sewa);
            $tanggal_kembali = $request->tk_durasi * $tanggal_sewa;
            $transaksi = TransaksiKendaraan::create([
                "user_id" => auth()->user()->id,
                "tk_durasi" => $validation["tk_durasi"],
                "tk_tanggal_sewa" => $validation["tk_tanggal_sewa"],
                "tk_tanggal_kembali" => date("d-m-y", $tanggal_kembali),
            ]);

            // Store Detail Transaksi
            foreach ($validation["items"] as $row => $value) {
                $MerkKendaraan = MerkKendaraan::where("mk_slug", "=", $value)->first();
                $total_harga = $MerkKendaraan->mk_tarif * $validation["tk_durasi"];
                DetailTransaksiKendaraan::create([
                    "transaksi_kendaraan_id" => $transaksi->id,
                    "kendaraan_id" => $MerkKendaraan->id,
                    "dtk_harga" => $total_harga,
                ]);
            }
        });

        return redirect("bayar");
    }
}
