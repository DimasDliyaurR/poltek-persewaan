<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\admin\PromoController;
use App\Http\Controllers\api\AsramaApiController;
use App\Http\Controllers\api\LayananApiController;
use App\Http\Controllers\api\GedungLapApiController;
use App\Http\Controllers\api\KendaraanApiController;
use App\Http\Controllers\api\AlatBarangApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("countdown/{id}", [PromoController::class, "getCountdown"]);

Route::controller(ApiController::class)->group(function () {

    Route::get("merkKendaraans/{slug}", "getMerkKendaraanBySlug")->name("merkKendaraan.get");

    Route::post("callback/payment", "callback")->name("callback.midtrans");

    Route::get("voucher/{promoCode}/{kategori}",  "cekPromo");

    Route::get("transaksi",  "getAllTransaksi");
});
Route::controller(KendaraanApiController::class)->group(function () {
    Route::group(["prefix" => "transportasi"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_transportasi");
    });
});

Route::controller(AlatBarangApiController::class)->group(function () {
    Route::group(["prefix" => "alat-barang"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_alat_barang");
    });
});

Route::controller(GedungLapApiController::class)->group(function () {
    Route::group(["prefix" => "gedung-lap"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_gedung_lap");
    });
});

Route::controller(LayananApiController::class)->group(function () {
    Route::group(["prefix" => "layanan"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_layanan");
    });
});

Route::controller(AsramaApiController::class)->group(function () {
    Route::group(["prefix" => "asrama"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_asrama");
    });
});
