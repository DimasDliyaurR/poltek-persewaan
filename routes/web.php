<?php

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
        // Index
        Route::get("merkKendaraans", "indexMerkKendaraan");

        // Create
        Route::post("merkKendaraans/create", "createMerkKendaraan");

        // store
        Route::get("merkKendaraan/store/{id}", "storeMerkKendaraan");

        // Show
        Route::get("merkKendaraan/show/{id}", "showMerkKendaraan");

        // Update
        Route::put("merkKendaraan/update/{id}", "updateMerkKendaraan");

        // Destroy
        Route::delete("merkKendaraan/delete/{id}", "destroyMerkKendaraan");
    });

    // Route::view("merkKendaraans/show", "admin.kendaraan.detail", [
    //     "title" => "update",
    // ]);
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
