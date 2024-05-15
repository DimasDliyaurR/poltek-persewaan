<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\FEAsramaController;
use App\Http\Controllers\FELayananController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PromoController;
use App\Http\Controllers\FEGedungLapController;
use App\Http\Controllers\FEKendaraanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\admin\AsramaController;
use App\Http\Controllers\FEAlatBarangController;
use App\Http\Controllers\admin\LayananController;
use App\Http\Controllers\admin\GedungLapController;
use App\Http\Controllers\admin\KendaraanController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\admin\AlatBarangController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\transaksi\AsramaFeController;
use App\Http\Controllers\transaksi\GedungFeController;
use App\Http\Controllers\transaksi\LayananFeController;
use App\Http\Controllers\transaksi\KendaraanFeController;
use App\Http\Controllers\transaksi\AlatBarangFeController;

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

// Route::get('/', function () {
//     return view('welcome', [
//         "title" => "Home",
//     ]);
// });



// BackEnd
/**
 * _____________________________________________________________________________
 * |                                                                            |
 * |                             ADMIN ROUTE                                    |
 * |                                                                            |
 * |****************************************************************************|
 * |
 * |
 * |
 */

Route::group(["prefix" => "admin", "middleware" => "auth"], function () {

    Route::group(["middleware" => "admin"], function () {

        Route::controller(KendaraanController::class)->group(function () {

            Route::group(["as" => "merkKendaraan."], function () {
                // Index Merk Kendaraan
                Route::get("merkKendaraans", "indexMerkKendaraan")->name("index");

                // Create Merk Kendaraan
                Route::post("merkKendaraans/create", "createMerkKendaraan")->name("create");

                // store Merk Kendaraan
                Route::get("merkKendaraan/store/{id}", "storeMerkKendaraan")->name("store");

                // Show Merk Kendaraan
                Route::get("merkKendaraan/show/{id}", "showMerkKendaraan")->name("show");

                // Update Merk Kendaraan
                Route::put("merkKendaraan/update/{id}", "updateMerkKendaraan")->name("update");

                // Destroy Merk Kendaraan
                Route::delete("merkKendaraan/delete/{id}", "destroyMerkKendaraan")->name("delete");
            });

            Route::group(["as" => "kendaraan."], function () {
                // Index Kendaraan
                Route::get("kendaraans", "indexKendaraan")->name("index");

                // Create Kendaraan
                Route::post("kendaraans/create", "createKendaraan")->name("create");

                // Show Kendaraan
                Route::get("kendaraan/show/{id}", "showKendaraan")->name("show");

                // Update Kendaraan
                Route::put("kendaraan/update/{id}", "updateKendaraan")->name("update");

                // Destroy Kendaraan
                Route::delete("kendaraan/delete/{id}", "destroyKendaraan")->name("destroy");
            });
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

            Route::group(["prefix" => "detailFotoTipeAsrama", "as" => "detailFotoTipeAsrama."], function () {
                // Index Detail Foto Tipe Asrama
                Route::get("/{id}", "indexDetailFotoTipeAsrama")->name("index");

                // Create Detail Foto Tipe Asrama
                Route::post("/create/{id}", "createDetailFotoTipeAsrama")->name("create");

                // store Detail Foto Tipe Asrama
                Route::get("/store/{id}", "storeDetailFotoTipeAsrama")->name("store");

                // Show Detail Foto Tipe Asrama
                Route::get("/show/{id}", "showDetailFotoTipeAsrama")->name("show");

                // Update Detail Foto Tipe Asrama
                Route::put("/update/{id}", "updateDetailFotoTipeAsrama")->name("update");

                // Destroy Detail Foto Tipe Asrama
                Route::delete("/delete/{id}", "destroyDetailFotoTipeAsrama")->name("destroy");
            });


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

            // Index Satuan Alat Barang
            Route::get("satuanAlatBarangs", "indexSatuanAlatBarang");

            // Create Satuan Alat Barang
            Route::post("satuanAlatBarangs/create", "createSatuanAlatBarang");

            // store Satuan Alat Barang
            Route::get("satuanAlatBarang/store/{id}", "storeSatuanAlatBarang");

            // Show Satuan Alat Barang
            Route::get("satuanAlatBarang/show/{id}", "showSatuanAlatBarang");

            // Update Satuan Alat Barang
            Route::put("satuanAlatBarang/update/{id}", "updateSatuanAlatBarang");

            // Destroy Satuan Alat Barang
            Route::delete("satuanAlatBarang/delete/{id}", "destroySatuanAlatBarang");
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

            Route::group(["prefix" => "detailFotoGedungLap", "as" => "detailFotoGedungLap."], function () {
                // Index Detail Foto Tipe Asrama
                Route::get("/{id}", "indexDetailFotoGedungLap")->name("index");

                // Create Detail Foto Tipe Asrama
                Route::post("/create/{id}", "createDetailFotoGedungLap")->name("create");

                // store Detail Foto Tipe Asrama
                Route::get("/store/{id}", "storeDetailFotoGedungLap")->name("store");

                // Show Detail Foto Tipe Asrama
                Route::get("/show/{id}", "showDetailFotoGedungLap")->name("show");

                // Update Detail Foto Tipe Asrama
                Route::put("/update/{id}", "updateDetailFotoGedungLap")->name("update");

                // Destroy Detail Foto Tipe Asrama
                Route::delete("/delete/{id}", "destroyDetailFotoGedungLap")->name("destroy");
            });
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

        Route::controller(UserController::class)->group(function () {
            // Index User
            Route::get("users", "indexUser")->name("user.index");

            // Index Show
            Route::get("/user/{id}", "showUser")->name("user.show");

            // Index Store
            Route::get("user/store/{id}", "storeUser")->name("user.store");

            // Index Update
            Route::put("user/update/{id}", "updateUser")->name("user.update");
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

    Route::controller(LaporanController::class)->group(function () {
        Route::group(["prefix" => "laporan", "as" => "laporan."], function () {
            Route::get('/', 'index')->name("index");
        });
    });
});

Route::controller(InvoiceController::class)->group(function () {
    Route::group(["middleware" => "auth", "as" => "invoice.", "prefix" => "invoice"], function () {
        Route::get("asrama/{codeUnique}", "asrama_invoice")->name("asrama");
        Route::get("layanan/{codeUnique}", "layanan_invoice")->name("layanan");
        Route::get("alatBarang/{codeUnique}", "alat_barang_invoice")->name("alatBarang");
        Route::get("gedungLap/{codeUnique}", "gedung_lap_invoice")->name("gedungLap");
        Route::get("transportasi/{codeUnique}", "transportasi_invoice")->name("transportasi");
    });
});


// FrontEnd
Route::view('/', 'index', [
    "title" => "Home",
]);
Route::view('/kalender', [LandingPageController::class, 'kalender']);
Route::get('/kalender/list', [LandingPageController::class, 'listEvent'])->name('kalender.list');

Route::get('/promo', [LandingPageController::class, 'promo']);
Route::get('/detailgedung/{id}', [FEgedungLapController::class, 'detail'])->name('detailgedung');

/**
 * _____________________________________________________________________________
 * |
 * |                           ROUTER MENU KATEGORI
 * |
 * |****************************************************************************
 * |
 * |
 * |
 */

Route::group(["prefix" => "transportasi", "as" => "transportasi."], function () {
    Route::controller(KendaraanFeController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

Route::group(["prefix" => "gedung", "as" => "gedung."], function () {
    Route::controller(GedungFeController::class)->group(function () {
        Route::get('/', "index")->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

Route::group(["prefix" => "layanan", "as" => "layanan."], function () {
    Route::controller(LayananFeController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

Route::group(["prefix" => "asrama", "as" => "asrama."], function () {
    Route::controller(AsramaFeController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

Route::group(["prefix" => "alat-barang", "as" => "alat-barang."], function () {
    Route::controller(AlatBarangFeController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

/**
 * _____________________________________________________________________________
 * |
 * |                            Auth LARAVEL / UI
 * |
 * |****************************************************************************
 * |
 * |
 * |
 */
Auth::routes();

Route::get('/promo', [LandingPageController::class, 'promo']);


// Route::controller(FEGedungLapController::class)->group(function () {
//     Route::get('/gedung', 'index');
//     Route::get('/gedung/detail', 'detail');
//     Route::get('/gedung/kalender', 'kalenderGedungLap');
// });
Route::get('/detailgedung/{id}', [FEgedungLapController::class, 'detail'])->name('detailgedung');
// Route::get('/k_pesan/{id}', [FEgedungLapController::class, 'store'])->name('k_pesan');
Route::get('/k_pesan/{id}', [FEKendaraanController::class, 'store'])->name('k_pesan');

// Route::controller(FELayananController::class)->group(function () {
//     Route::get('/layanan', 'index');
//     Route::get('/layanan/kalender', 'kalenderLayanan');
//     Route::get('layanan/list', 'listEventLayanan')->name('layanan.list');
// });

Route::controller(FEAsramaController::class)->group(function () {
    Route::get('/asrama', 'index');
    Route::get('/asrama/kalender', 'kalenderAsrama');
    Route::get('/asrama/list', 'listEventAsrama')->name('asrama.list');
});
Route::controller(FEAlatBarangController::class)->group(function () {
    Route::get('/alatbarang', 'index');
    Route::get('/alatbarang/kalender', 'kalenderAlatBarang');
    Route::get('/alatbarang/list', 'listEventAb')->name('ab.list');
});


Route::controller(FEKendaraanController::class)->group(function () {
    Route::get('/transportasi', 'index');
    Route::get('/transportasi/detail', 'detail');
    Route::get('/transportasi/kalender', 'kalender');
    Route::get('/transportasi/list', 'listEventTransportasi')->name('transportasi.list');
});
//FE
//Route::get('/transportasi/detail', 'detail');
//end FE
//    Route::get('/transportasi/pesan','pesan');
//Route::get('/transportasi/{slug}', 'detail');
//    Route::get('/transportasi/{slug}/pesan', 'pesanForm');
//  Route::get('/transportasi/{slug}/pesan', 'pesanForm')->middleware("auth");
// Route::post('/transportasi/beli-langsung', 'pesan')->name('transportasi.pesan');
//    Route::post('/transportasi/beli-langsung', 'pesan')->name('transportasi.pesan')->middleware("auth");
//});

//KENDARAAN FE
Route::controller(FEKendaraanController::class)->group(function () {
    Route::get('/transportasi', 'index');
    Route::get('/transportasi/detail', 'detail');
    Route::get('/transportasi/pesan', 'pesan');
    Route::get('/transportasi/invoice', 'invoice');
    Route::get('/print', 'print_invoice');
});
// ASRAMA FE
Route::view('/asrama/detail', 'asrama.detail', [
    "title" => "Detail Asrama",
]);
Route::view('/asrama/pesan', 'asrama.transaksi_pemesanan', [
    "title" => "Pesan Asrama",
]);
Route::view('/asrama/bayar', 'asrama.transaksi_pembayaran', [
    "title" => "Bayar Asrama",
]);

Route::view('/asrama/invoice', 'asrama.transaksi_invoice', [
    "title" => "Invoice Asrama",
]);
Route::view('/asrama/print', 'asrama.invoice_print', [
    "title" => " Print Invoice Asrama",
]);

Route::get('/asrama/printpdf', [FEAsramaController::class, 'cetak'])->name('asrama.printpdf');
//TRANSPORTASI FE
Route::view('/transportasi', 'transportasi.index', [
    "title" => "Transportasi",
]);
// LAYANAN FE
Route::view('/layanan/detail', 'layanan.detail', [
    "title" => "Detail Layanan",
]);
Route::view('/bayar', 'user_transaksi.bayar', [
    "title" => "Pembayaran",
]);
Route::view('/layanan', 'layanan.index', [
    "title" => "Layanan",
]);
Route::view('/layanan/invoice', 'layanan.invoice', [
    "title" => "Invoice Layanan",
]);
Route::view('/layanan/print', 'layanan.invoice_print', [
    "title" => "Invoice Layanan",
]);
Route::view('/layanan/pesan', 'layanan.transaksi_pemesanan', [
    "title" => "Pemesanan Layanan",
]);

// ALAT BARANG FE

Route::view('/alatbarang', 'alatBarang.index', [
    "title" => "Alat Barang",
]);
Route::view('/alat-barang/detail', 'alatBarang.detail', [
    "title" => "Detail Alat Barang",
]);
Route::view('/alat-barang/pesan', 'alatBarang.transaksi_pemesanan', [
    "title" => "Pemesanan Alat Barang",
]);
Route::view('/alat-barang/invoice', 'alatBarang.invoice', [
    "title" => "Invoice Alat Barang",
]);
Route::view('/alat-barang/print', 'alatBarang.invoice_print', [
    "title" => "Invoice Alat Barang",
]);


// GEDUNG LAP FE
// Route::view('/gedung','GedungLap.index', [
//     "title" => "Kategori Gedung",
// ]);


Route::view('/gedung/detail', 'GedungLap.detail', [
    "title" => "Detail Gedung",
]);
Route::view('/gedung/pesan', 'GedungLap.transaksi_pemesanan', [
    "title" => "Pemesanan Gedung Lap",
]);
Route::view('/gedung/invoice', 'GedungLap.invoice', [
    "title" => "Invoice Gedung Lap",
]);
Route::view('/gedung/print', 'GedungLap.invoice_print', [
    "title" => "Print Invoice Gedung Lap",
]);
// TRANSAKSI
Route::view('/invoice', 'user.invoice', [
    "title" => "Invoice",
]);
Route::view('/riwayat', 'user.riwayat_pesanan', [
    "title" =>  "Riwayat Pesanan"
]);
Route::view('/indexnew', 'indexnew', [
    "title" => "Home",
]);
// USER
Route::view('/user', 'layouts-user.main', [
    "title" => "Dashboard User"
]);
Route::view('/edit-profile', 'user.edit-profile', [
    "title" => "Edit Profile"
]);
Route::view('/profile', 'user.profile', [
    "title" => " View Profile"
]);
Route::view('/voucher', 'user.riwayat_voucher', [
    "title" => "Riwayat Voucher"
]);
Route::view('/dashboard', 'user.dash', [
    "title" => "Dashboard"
]);
Route::view('/invoice', 'user.riwayat_invoice', [
    "title" => "Invoice",
]);
Route::view('/detail_invoice', 'user.invoice', [
    "title" => "Invoice",
]);
