<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKendaraan;
use App\Models\Kendaraan;
use App\Http\Controllers\Controller;


class FETransaksiController extends Controller
{
    public function pesan ($id){
        $kendaraan = Kendaraan::find($id);
        return view( 'user_transaksi.k_pesan', [
            "title" => "Pemesanan",
            "kendaraan" => $kendaraan,
        ]);
    }
    public function storePemesanan (Request $request ){ 
        $validatedData = $request->validate([
            'user_id'=>'required|integer',
            'tk_tanggal_sewa' => 'required',
            'tk_durasi' => 'required',
            'tk_tanggal_kembali' => 'required'
        ]);
        // proses penyimpanan data 
        $tk_kendaraan = new TransaksiKendaraan();

        $tk_kendaraan->user_id = $validatedData['user_id'];
        $tk_kendaraan->tk_tanggal_sewa = $validatedData['tk_tanggal_sewa'];
        $tk_kendaraan->tk_tanggal_kembali = $validatedData['tk_tanggal_kembali'];
        $tk_kendaraan->save();
        return redirect()->route('user_transaksi.bayar')->with('success', 'pemesanan berhasil disimpan, lanjutkan pembayaran !');
    }

}
