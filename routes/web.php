<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        "title" => "Home",
    ]);
});
// BackEnd
Route::view('/admin/kendaraans', 'admin.kendaraan.lihat', [
    "title" => "Kendaraan-admin",
]);

// FrontEnd
Route::view('/index', 'index', [
    "title" => "Home",
]);
Route::view('/detailbus', 'detail.detail_bus', [
    "title"=>"Detail Bus "])->name('detailbus');
Route::view('/login', 'login',[
    "title" => "Login",
]);
Route::view('/signup','signup',[
    "title" => "Sign Up",
]);
Route::view('/transportasi', 'kategori.transportasi',[
    "title" => "Transportasi"
]);
Route::view('/gedung', 'kategori.gedung',[
    "title" => "Gedung"
]);
Route::view('/layanan', 'kategori.layanan',[
    "title" => "Layanan"
]);
Route::view('/penginapan', 'kategori.penginapan',[
    "title" => "Penginapan"
]);
Route::view('/aset', 'kategori.aset',[
    "title" => "Aset"
]);

// Kategori
Route::view('/sewaBus', 'sewa.sewa_bus',[
    "title" =>"Sewa Bus",
]);
// Transaksi
Route::view('/pesan', 'user_transaksi.pesan',[
    "title" => "Pemesanan",
]);
Route::view('/bayar', 'user_transaksi.bayar',[
    "title" => "Pembayaran",
]);
Route::view('/invoice', 'user_transaksi.invoice',[
    "title" => "Invoice",
]);

