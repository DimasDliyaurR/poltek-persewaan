<?php

use App\Http\Controllers\AlatBarangController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;
use App\Services\GedungLap\GedungLapService;
use App\Services\AlatBarang\AlatBarangService;
use Illuminate\Http\Request;

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

Route::group(["prefix" => "admin"], function () {
    Route::controller(KendaraanController::class)->group(function () {
        // Index Merk Kendaraan
        Route::get("merkKendaraans", "indexMerkKendaraan");

        // Create Merk Kendaraan
        Route::post("merkKendaraans/create", "createMerkKendaraan");

        // store Merk Kendaraan
        Route::get("merkKendaraan/store/{id}", "storeMerkKendaraan");

        // Show Merk Kendaraan
        Route::get("merkKendaraan/show/{id}", "showMerkKendaraan");

        // Update Merk Kendaraan
        Route::put("merkKendaraan/update/{id}", "updateMerkKendaraan");

        // Destroy Merk Kendaraan
        Route::delete("merkKendaraan/delete/{id}", "destroyMerkKendaraan");

        // Index Kendaraan
        Route::get("kendaraans", "indexKendaraan");

        // Create Kendaraan
        Route::post("kendaraans/create", "createKendaraan");

        // Show Kendaraan
        Route::get("kendaraan/show/{id}", "showKendaraan");

        // Update Kendaraan
        Route::put("kendaraan/update/{id}", "updateKendaraan");

        // Destroy Kendaraan
        Route::delete("kendaraan/delete/{id}", "destroyKendaraan");
    });

    Route::controller(AsramaController::class)->group(function () {
        // Index Fasilitas Asrama
        Route::get("fasilitasAsramas", "indexFasilitasAsrama");

        // Create Fasilitas Asrama
        Route::post("fasilitasAsramas/create", "createFasilitasAsrama");

        // store Fasilitas Asrama
        Route::get("fasilitasAsrama/store/{id}", "storeFasilitasAsrama");

        // Show Fasilitas Asrama
        Route::get("fasilitasAsrama/show/{id}", "showFasilitasAsrama");

        // Update Fasilitas Asrama
        Route::put("fasilitasAsrama/update/{id}", "updateFasilitasAsrama");

        // Destroy Fasilitas Asrama
        Route::delete("fasilitasAsrama/delete/{id}", "destroyFasilitasAsrama");

        // Index Asrama
        Route::get("asramas", "indexAsrama");

        // Create Asrama
        Route::post("asramas/create", "createAsrama");

        // store Asrama
        Route::get("asrama/store/{id}", "storeAsrama");

        // Show Fasilitas Asrama
        Route::get("asrama/show/{id}", "showAsrama");

        // Update Fasilitas Asrama
        Route::put("asrama/update/{id}", "updateAsrama");

        // Destroy Fasilitas Asrama
        Route::delete("asrama/delete/{id}", "destroyAsrama");

        // Index Detail Fasilitas Asrama
        Route::get("detailFasilitasAsrama/{id}", "indexDetailFasilitasAsrama");

        // Add Fasilitas Asrama
        Route::post("detailFasilitasAsrama/create/fasilitas/{id}", "createDetailFasilitasAsrama");

        // Delete Detail Fasilitas Asrama
        Route::delete("detailFasilitasAsrama/delete/{id}", "destroyDetailFasilitas");
    });

    Route::controller(AlatBarangController::class)->group(function () {
        // Index Alat Barang
        Route::get("alatBarangs", "indexAlatBarang");

        // Create Alat Barang
        Route::post("alatBarangs/create", "createAlatBarang");

        // store Asrama
        Route::get("alatBarang/store/{id}", "storeAlatBarang");

        // Show Fasilitas Asrama
        Route::get("alatBarang/show/{id}", "showAlatBarang");

        // Update Fasilitas Asrama
        Route::put("alatBarang/update/{id}", "updateAlatBarang");

        // Destroy Fasilitas Asrama
        Route::delete("alatBarang/delete/{id}", "destroyAlatBarang");

        // Index Alat Barang
        Route::get("detailFotoAlatBarangs/{id}", "indexFotoAlatBarang");

        // Create Alat Barang
        Route::post("detailFotoAlatBarang/create/{id}", "createFotoAlatBarang");
    });
});


// FrontEnd
Route::view('/index', 'index', [
    "title" => "Home",
]);
Route::view('/detailbus', 'detail.detail_bus', ["title" => "Detail Bus "])
    ->name('detailbus');
Route::view('/login', 'login', [
    "title" => "Login",
]);
Route::view(
    '/transportasi',
    'kategori.transportasi',
    [
        "title" => "Transportasi"
    ]
);
