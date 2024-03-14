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

Route::view('/admin/kendaraans', 'admin.kendaraan.lihat', [
    "title" => "Kendaraan-admin",
]);

Route::get("asrama/{id}", function ($id, AlatBarangService $service) {
    $service->getDataAlatBarangById($id);
});
