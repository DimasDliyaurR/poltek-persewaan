<?php

use Illuminate\Support\Facades\Route;
use App\Services\Asrama\AsramaService;
use App\Services\GedungLap\GedungLapService;
use App\Services\AlatBarang\AlatBarangService;

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

Route::get("asrama/{id}", function ($id, AlatBarangService $service) {
    $service->getDataAlatBarangById($id);
});

// BackEnd
Route::view('/admin/kendaraans', 'admin.kendaraan.lihat', [
    "title" => "Kendaraan-admin",
]);

// FrontEnd
Route::view('/index', 'index', [
    "title" => "Home",
]);
Route::view('/detailbus', 'detail.detail_bus', ["title"=>"Detail Bus "])
->name('detailbus');
Route::view('/login', 'login',[
    "title" => "Login",
]);
Route::view('/transportasi', 'kategori.transportasi',
[
    "title" => "Transportasi"
]);