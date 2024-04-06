<?php

use App\Http\Controllers\AlatBarangController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\GedungLapController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TransaksiController;
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

        // Index Tipe Asrama
        Route::get("tipeAsramas", "indexTipeAsrama");

        // Create Tipe Asrama
        Route::post("tipeAsramas/create", "createTipeAsrama");

        // store Tipe Asrama
        Route::get("tipeAsrama/store/{id}", "storeTipeAsrama");

        // Show Tipe Asrama
        Route::get("tipeAsrama/show/{id}", "showTipeAsrama");

        // Update Tipe Asrama
        Route::put("tipeAsrama/update/{id}", "updateTipeAsrama");

        // Destroy Tipe Asrama
        Route::delete("tipeAsrama/delete/{id}", "destroyTipeAsrama");

        // Restore Tipe Asrama
        Route::get("tipeAsrama/restore/{id}", "restoreTipeAsrama");
    });

    Route::controller(AlatBarangController::class)->group(function () {
        // Index Alat Barang
        Route::get("alatBarangs", "indexAlatBarang");

        // Create Alat Barang
        Route::post("alatBarangs/create", "createAlatBarang");

        // store Alat Barang
        Route::get("alatBarang/store/{id}", "storeAlatBarang");

        // Show Alat Barang
        Route::get("alatBarang/show/{id}", "showAlatBarang");

        // Update Alat Barang
        Route::put("alatBarang/update/{id}", "updateAlatBarang");

        // Destroy Alat Barang
        Route::delete("alatBarang/delete/{id}", "destroyAlatBarang");

        // Index Alat Barang
        Route::get("detailFotoAlatBarangs/{id}", "indexFotoAlatBarang");

        // Create Alat Barang
        Route::post("detailFotoAlatBarang/create/{id}", "createFotoAlatBarang");
    });

    Route::controller(GedungLapController::class)->group(function () {
        // Index Gedung Lapangan
        Route::get("gedungLaps", "indexGedungLap");

        // Create Gedung Lapangan
        Route::post("gedungLaps/create", "createGedungLap");

        // store Gedung Lapangan
        Route::get("gedungLap/store/{id}", "storeGedungLap");

        // Show Gedung Lapangan
        Route::get("gedungLap/show/{id}", "showGedungLap");

        // Update Gedung Lapangan
        Route::put("gedungLap/update/{id}", "updateGedungLap");

        // Destroy Gedung Lapangan
        Route::delete("gedungLap/delete/{id}", "destroyGedungLap");

        // Index Property Gedung Lapangan
        Route::get("propertyGedungLaps", "indexPropertyGedungLap");

        // Create Property Gedung Lapangan
        Route::post("propertyGedungLaps/create", "createPropertyGedungLap");

        // Destroy Property Gedung Lapangan
        Route::delete("propertyGedungLap/delete/{id}", "destroyPropertyGedungLap");
    });

    Route::controller(LayananController::class)->group(function () {
        // Index Layanan
        Route::get("layanans", "indexLayanan");

        // Create Layanan
        Route::post("layanans/create", "createLayanan");

        // store Layanan
        Route::get("layanan/store/{id}", "storeLayanan");

        // Show Layanan
        Route::get("layanan/show/{id}", "showLayanan");

        // Update Layanan
        Route::put("layanan/update/{id}", "updateLayanan");

        // Destroy Layanan
        Route::delete("layanan/delete/{id}", "destroyLayanan");

        // Index Tim Layanan
        Route::get("timLayanans/{id}", "indexTimLayanan");

        // Create Tim Layanan
        Route::post("timLayanans/create/{id}", "createTimLayanan");

        // update Tim Layanan
        Route::put("timLayanan/update/{id}", "updateTimLayanan");

        // Destroy Tim Layanan
        Route::delete("timLayanan/delete/{id}", "destroyTimLayanan");

        // Index Video Layanan
        Route::get("videoLayanans/{id}", "indexVideoLayanan");

        // Create Video Layanan
        Route::post("videoLayanans/create/{id}", "createVideoLayanan");

        // update Video Layanan
        Route::put("videoLayanan/update/{id}", "updateVideoLayanan");

        // Destroy Video Layanan
        Route::delete("videoLayanan/delete/{id}", "destroyVideoLayanan");

        // Index Detail Foto Layanan
        Route::get("detailFotoLayanans/{id}", "indexDetailFotoLayanan");

        // Create Detail Foto Layanan
        Route::post("detailFotoLayanans/create/{id}", "createDetailFotoLayanan");

        // update Detail Foto Layanan
        Route::put("detailFotoLayanan/update/{id}", "updateDetailFotoLayanan");

        // Destroy Detail Foto Layanan
        Route::delete("detailFotoLayanan/delete/{id}", "destroyDetailFotoLayanan");
    });

    Route::controller(PromoController::class)->group(function () {
        // Index Promo
        Route::get("promos", "indexPromo");
        // Create Promo
        Route::post("promos/create", "createPromo");
        // Store Promo
        Route::get("promo/store/{id}", "storePromo");
        // Show Promo
        Route::get("promo/show/{id}", "showPromo");
        // Update Promo
        Route::put("promo/update/{id}", "updatePromo");
        // Destroy Promo
        Route::delete("promo/delete/{id}", "destroyPromo");
    });

    Route::controller(TransaksiController::class)->group(function () {
        // Index Transaksi Kendaraan
        Route::get("transaksi-kendaraans", "indexTransaksiKendaraan");
        // Index Transaksi Layanan
        Route::get("transaksi-layanans", "indexTransaksiLayanan");
        // Index Transaksi Asrama
        Route::get("transaksi-asramas", "indexTransaksiAsrama");
        // Index Transaksi Alat Barang
        Route::get("transaksi-alatBarangs", "indexTransaksiAlatBarang");
        // Index Transaksi Gedung & Lapangan
        Route::get("transaksi-gedungLaps", "indexTransaksiGedungLap");
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
