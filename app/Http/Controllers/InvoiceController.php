<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiAsrama;
use App\Models\TransaksiGedung;
use App\Models\TransaksiLayanan;
use App\Models\TransaksiKendaraan;
use App\Models\TransaksiAlatBarang;

class InvoiceController extends Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
    }

    public function asrama_invoice($codeUnique)
    {
        $detailTransaksi = TransaksiAsrama::with(["asramas.tipeAsrama.paymentMethod", "fasilitasAsrama", "promo", "user.profile"])->whereCodeUnique($codeUnique)->get();

        if (count($detailTransaksi) == 0 || $detailTransaksi[0]->status != "terbayar" || auth()->user()->id != $detailTransaksi[0]->user_id) {
            abort(404);
        }

        $total = 0;
        $sub_total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $snap_token = $transaksi->ta_snap_token;
            $promo = $transaksi->promo;

            foreach ($transaksi->asramas as $asrama) {
                $sub_total += $asrama->tipeAsrama->ta_tarif;
            }

            $total += $transaksi->ta_sub_total;
        }

        $promo = $promo != null ? ($detailTransaksi->promo->tipe == "fixed") ?
            $sub_total - $this->promo->p_isi : $sub_total - ($sub_total * ($this->promo->p_isi / 100)) : null;

        return view("asrama.invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }

    public function alat_barang_invoice($codeUnique)
    {
        $detailTransaksi = TransaksiAlatBarang::with(["alatBarangs" => ["paymentMethod", "satuanAlatBarangs"], "promo",])->whereCodeUnique($codeUnique)->get();

        if (count($detailTransaksi) == 0 || $detailTransaksi[0]->status != "terbayar" || auth()->user()->id != $detailTransaksi[0]->user_id) {
            abort(404);
        }

        $sub_total = 0;
        $total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            foreach ($transaksi->alatBarangs as $alatBarang) {
                $sub_total += $alatBarang->ab_tarif;
            }

            $snap_token = $transaksi->snap_token;
            $total += $transaksi->tab_sub_total;
        }

        $promo = $promo != null ? ($detailTransaksi->promo->tipe == "fixed") ?
            $sub_total - $this->promo->p_isi : $sub_total - ($sub_total * ($this->promo->p_isi / 100)) : null;

        return view("alatBarang.invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }

    public function layanan_invoice($codeUnique)
    {
        $detailTransaksi = TransaksiLayanan::with(["layanans.paymentMethod", "promo", "user.profile"])->whereCodeUnique($codeUnique)->get();

        if (count($detailTransaksi) == 0 || $detailTransaksi[0]->status != "terbayar" || auth()->user()->id != $detailTransaksi[0]->user_id) {
            abort(404);
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

        return view("layanan.invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "subTotal" => $sub_total,
        ]);
    }

    public function gedung_lap_invoice($codeUnique)
    {
        $detailTransaksi = TransaksiGedung::with(["gedungLap.paymentMethod", "promo", "user.profile"])->whereCodeUnique($codeUnique)->get();
        if (count($detailTransaksi) == 0 || $detailTransaksi[0]->status != "terbayar" || auth()->user()->id != $detailTransaksi[0]->user_id) {
            abort(404);
        }
        $sub_total = 0;
        $total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            foreach ($transaksi->gedungLap as $gedung) {
                $sub_total += $gedung->gl_tarif;
            }

            $snap_token = $transaksi->tg_snap_token;
            $total += $transaksi->tg_sub_total;
        }

        $promo = $promo != null ? ($detailTransaksi->promo->tipe == "fixed") ?
            $sub_total - $this->promo->p_isi : $sub_total - ($sub_total * ($this->promo->p_isi / 100)) : null;

        return view("gedungLap.invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }

    public function transportasi_invoice($codeUnique)
    {
        $detailTransaksi = TransaksiKendaraan::with(["kendaraans.merkKendaraan.paymentMethod", "promo", "users"])->whereCodeUnique($codeUnique)->get();
        if (count($detailTransaksi) == 0 || $detailTransaksi[0]->status != "terbayar" || auth()->user()->id != $detailTransaksi[0]->user_id) {
            abort(404);
        }
        $sub_total = 0;

        foreach ($detailTransaksi as $transaksi) {
            $promo = $transaksi->promo;

            $tanggal_sewa_unix = strtotime($transaksi->tk_tanggal_sewa);
            $tanggal_kembali_unix = strtotime($transaksi->tk_tanggal_kembali);
            $durasi = intdiv(($tanggal_kembali_unix - $tanggal_sewa_unix), (24 * 60 * 60));

            foreach ($transaksi->kendaraans as $asrama) {
                $sub_total += $asrama->merkKendaraan->mk_tarif;
            }
            $snap_token = $transaksi->tk_snap_token;
            $total = $transaksi->tk_sub_total;

            $promo = $transaksi->promo != null ? (($transaksi->promo->p_tipe == "fixed") ?
                $transaksi->promo->p_isi : $sub_total * ($transaksi->promo->p_isi / 100)) : null;
        }

        return view("transportasi.invoice", [
            "title" => "pembayaran",
            "snapToken" => $snap_token,
            "detailTransaksi" => $detailTransaksi,
            "totalPromo" => $promo,
            "total" => $total,
        ]);
    }
}
