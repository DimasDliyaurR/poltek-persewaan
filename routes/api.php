<?php

use App\Http\Controllers\admin\PromoController;
use App\Http\Controllers\api\ApiController;
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

Route::get("merkKendaraans/{slug}", [ApiController::class, "getMerkKendaraanBySlug"])->name("merkKendaraan.get");
Route::get("callback/payment", [ApiController::class, "callback"])->name("callback.midtrans");
