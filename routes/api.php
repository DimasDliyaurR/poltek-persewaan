<?php

use App\Http\Controllers\admin\PromoController;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\KendaraanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});
Route::controller(KendaraanApiController::class)->group(function () {
    Route::group(["prefix" => "transportasi"], function () {
        Route::post("pelaksanaan", "validasi_form_transaksi_transportasi");
    });
});
