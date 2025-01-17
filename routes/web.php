<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\PromoController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\admin\AsramaController;
use App\Http\Controllers\admin\LayananController;
use App\Http\Controllers\admin\GedungLapController;
use App\Http\Controllers\admin\KendaraanController;
use App\Http\Controllers\admin\AlatBarangController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\transaksi\AsramaFeController;
use App\Http\Controllers\transaksi\GedungFeController;
use App\Http\Controllers\transaksi\LayananFeController;
use App\Http\Controllers\transaksi\KendaraanFeController;
use App\Http\Controllers\transaksi\AlatBarangFeController;
use App\Http\Controllers\user\DashboardUserController;
use PHPUnit\Framework\Attributes\Group;

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
        Route::controller(DashboardController::class)->group(function () {
            Route::get("/", "index")->name("admin.index");
        });

        Route::controller(KendaraanController::class)->group(function () {
            Route::group(["middleware" => "admin-kendaraan"], function () {
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

                    // Update Status Kendaraan
                    Route::get("kendaraan/status/{id}", "updateStatusKendaraan")->name("update.status");

                    // Destroy Kendaraan
                    Route::delete("kendaraan/delete/{id}", "destroyKendaraan")->name("destroy");
                });
            });
        });

        Route::controller(AsramaController::class)->group(function () {
            Route::group(["middleware" => "admin-asrama"], function () {
                Route::group(["as" => "fasilitasAsrama."], function () {
                    // Index Fasilitas Asrama
                    Route::get("fasilitasAsramas", "indexFasilitasAsrama")->name("index");

                    // Create Fasilitas Asrama
                    Route::post("fasilitasAsramas/create", "createFasilitasAsrama")->name("create");

                    // store Fasilitas Asrama
                    Route::get("fasilitasAsrama/store/{id}", "storeFasilitasAsrama")->name("store");

                    // Show Fasilitas Asrama
                    Route::get("fasilitasAsrama/show/{id}", "showFasilitasAsrama")->name("show");

                    // Update Fasilitas Asrama
                    Route::put("fasilitasAsrama/update/{id}", "updateFasilitasAsrama")->name("update");

                    // Destroy Fasilitas Asrama
                    Route::delete("fasilitasAsrama/delete/{id}", "destroyFasilitasAsrama")->name("destroy");
                });

                Route::group(["as" => "asrama."], function () {

                    // Index Asrama
                    Route::get("asramas", "indexAsrama")->name("index");

                    // Create Asrama
                    Route::post("asramas/create", "createAsrama")->name("create");

                    // store Asrama
                    Route::get("asrama/store/{id}", "storeAsrama")->name("store");

                    // Show Asrama
                    Route::get("asrama/show/{id}", "showAsrama")->name("show");

                    // Update Asrama
                    Route::put("asrama/update/{id}", "updateAsrama")->name("update");

                    // Update Asrama
                    Route::get("asrama/status/{id}", "updateStatusAsrama")->name("update.status");

                    // Destroy Asrama
                    Route::delete("asrama/delete/{id}", "destroyAsrama")->name("delete");
                });

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

                Route::group(["as" => "tipeAsrama."], function () {
                    Route::get("tipeAsramas", "indexTipeAsrama")->name("index");

                    // Create Tipe Asrama
                    Route::post("tipeAsramas/create", "createTipeAsrama")->name("create");

                    // store Tipe Asrama
                    Route::get("tipeAsrama/store/{id}", "storeTipeAsrama")->name("store");

                    // Show Tipe Asrama
                    Route::get("tipeAsrama/show/{id}", "showTipeAsrama")->name("show");

                    // Update Tipe Asrama
                    Route::put("tipeAsrama/update/{id}", "updateTipeAsrama")->name("update");

                    // Destroy Tipe Asrama
                    Route::delete("tipeAsrama/delete/{id}", "destroyTipeAsrama")->name("destroy");

                    // Restore Tipe Asrama
                    Route::get("tipeAsrama/restore/{id}", "restoreTipeAsrama")->name("restore");
                });

                Route::group(["prefix" => "daftar-penyewa", "as" => "daftar-penyewa."], function () {
                    Route::get("", "indexDaftarPenyewa")->name("index");
                    Route::get("{id}", "detailDaftarPenyewa")->name("detail");
                    Route::get("/reschedule/{id}", "rescheduleTransaksiAsrama")->name("penyewa");
                });
            });
        });

        Route::controller(AlatBarangController::class)->group(function () {
            Route::group(["middleware" => "admin-alat-barang", "as" => "alatBarang."], function () {
                // Index Alat Barang
                Route::get("alatBarangs", "indexAlatBarang")->name("index");

                // Create Alat Barang
                Route::post("alatBarangs/create", "createAlatBarang")->name("create");

                // store Alat Barang
                Route::get("alatBarang/store/{id}", "storeAlatBarang")->name("store");

                // Show Alat Barang
                Route::get("alatBarang/show/{id}", "showAlatBarang")->name("show");

                // Update Alat Barang
                Route::put("alatBarang/update/{id}", "updateAlatBarang")->name("update");

                // Destroy Alat Barang
                Route::delete("alatBarang/delete/{id}", "destroyAlatBarang")->name("delete");

                // Index Alat Barang
                Route::get("detailFotoAlatBarangs/{id}", "indexFotoAlatBarang")->name("detailFotoAlatBarang.index");

                // Create Alat Barang
                Route::post("detailFotoAlatBarang/create/{id}", "createFotoAlatBarang")->name("detailFotoAlatBarang.create");

                // Index Satuan Alat Barang
                Route::get("satuanAlatBarangs", "indexSatuanAlatBarang")->name("satuanAlatBarang.index");

                // Create Satuan Alat Barang
                Route::post("satuanAlatBarangs/create", "createSatuanAlatBarang")->name('satuanAlatBarang.create');

                // store Satuan Alat Barang
                Route::get("satuanAlatBarang/store/{id}", "storeSatuanAlatBarang")->name("satuanAlatBarang.store");

                // Show Satuan Alat Barang
                Route::get("satuanAlatBarang/show/{id}", "showSatuanAlatBarang")->name("satuanAlatBarang.show");

                // Update Satuan Alat Barang
                Route::put("satuanAlatBarang/update/{id}", "updateSatuanAlatBarang")->name("satuanAlatBarang.update");

                // Destroy Satuan Alat Barang
                Route::delete("satuanAlatBarang/delete/{id}", "destroySatuanAlatBarang")->name("satuanAlatBarang.delete");
            });
        });

        Route::controller(GedungLapController::class)->group(function () {
            Route::group(["middleware" => "admin-gedung-lap"], function () {

                Route::group(["as" => "gedungLap."], function () {
                    // Index Gedung Lapangan
                    Route::get("gedungLaps", "indexGedungLap")->name("index");

                    // Create Gedung Lapangan
                    Route::post("gedungLaps/create", "createGedungLap")->name("create");

                    // store Gedung Lapangan
                    Route::get("gedungLap/store/{id}", "storeGedungLap")->name("store");

                    // Show Gedung Lapangan
                    Route::get("gedungLap/show/{id}", "showGedungLap")->name("show");

                    // Update Gedung Lapangan
                    Route::put("gedungLap/update/{id}", "updateGedungLap")->name("update");

                    // Destroy Gedung Lapangan
                    Route::delete("gedungLap/delete/{id}", "destroyGedungLap")->name("destroy");

                    // Kalender Gedung Lapangan
                    Route::get("/gedung/kalender", "listEvent");
                });

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
        });

        Route::controller(LayananController::class)->group(function () {

            Route::group(["middleware" => "admin-layanan", "as" => "layanan."], function () {
                // Index Layanan
                Route::get("layanans", "indexLayanan")->name("index");

                // Create Layanan
                Route::post("layanans/create", "createLayanan")->name("create");

                // store Layanan
                Route::get("layanan/store/{id}", "storeLayanan")->name("store");

                // Show Layanan
                Route::get("layanan/show/{id}", "showLayanan")->name("show");

                // Update Layanan
                Route::put("layanan/update/{id}", "updateLayanan")->name("update");

                // Destroy Layanan
                Route::delete("layanan/delete/{id}", "destroyLayanan")->name("destroy");

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
        });

        Route::controller(UserController::class)->group(function () {
            Route::group(["middleware" => "super-admin"], function () {

                // Index User
                Route::get("users", "indexUser")->name("user.index");

                // Index Show
                Route::get("/user/{id}", "showUser")->name("user.show");

                // Index Store
                Route::get("user/store/{id}", "storeUser")->name("user.store");

                // Index Update
                Route::put("user/update/{id}", "updateUser")->name("user.update");

                // Index Activity Log
                Route::get("activity-log", "indexLogActiviy")->name("activity-log.index");

                Route::get("changePassword", "changePasswordUserIndex")->name("admin.changePassword.index");
                Route::post("changePassword/update", "changePasswordUser")->name("admin.changePassword");
            });
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

    Route::controller(LaporanController::class)->group(function () {
        Route::group(["prefix" => "laporan", "middleware" => ["admin-keuangan", "admin-dpupk"], "as" => "laporan."], function () {
            Route::get('/', 'pemasukan')->name("index");
            // Index Transaksi Kendaraan
            Route::get("transaksi-kendaraans", "indexTransaksiKendaraan")->name("kendaraan");
            Route::get("transaksi-kendaraans/{id}", "showTransaksiKendaraan")->name("kendaraan.show");

            // Index Transaksi Layanan
            Route::get("transaksi-layanans", "indexTransaksiLayanan")->name("layanan");
            Route::get("transaksi-layanans/{id}", "showTransaksiLayanan")->name("layanan.show");

            // Index Transaksi Asrama
            Route::get("transaksi-asramas", "indexTransaksiAsrama")->name("asrama");
            Route::get("transaksi-asramas/{id}", "showTransaksiAsrama")->name("asrama.show");

            // Index Transaksi Alat Barang
            Route::get("transaksi-alatBarangs", "indexTransaksiAlatBarang")->name("alat-barang");
            Route::get("transaksi-alatBarangs/{id}", "showTransaksiAlatBarang")->name("alat-barang.show");

            // Index Transaksi Gedung & Lapangan
            Route::get("transaksi-gedungLaps", "indexTransaksiGedungLap")->name("gedung-lap");
            Route::get("transaksi-gedungLaps/{id}", "showTransaksiGedungLap")->name("gedung-lap.show");
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
Route::controller(HomeController::class)->group(function () {
    Route::get('/', "index");
});

// Route::get('/kalender', [LandingPageController::class, 'kalender']);
// Route::get('/kalender/list', [LandingPageController::class, 'listEvent'])->name('kalender.list');


Route::controller(LayananFEController::class)->group(function () {
    Route::get('/layanan/kalender', 'kalenderLayanan');
    Route::get('layanan/list', 'listEventLayanan')->name('layanan.list');
});

Route::controller(AsramaFEController::class)->group(function () {
    Route::get('/asrama/kalender', 'kalenderAsrama');
    Route::get('/asrama/list', 'listEventAsrama')->name('asrama.list');
});
Route::controller(GedungFeController::class)->group(function () {
    Route::get('/gedung/kalender', 'kalenderGedungLap');
    Route::get('/gedung/list', 'listEventGedungLap')->name('gedunglap.list');
});
Route::controller(KendaraanFEController::class)->group(function () {
    Route::get('/transportasi/kalender', 'kalender');
    Route::get('/transportasi/list', 'listEventTransportasi')->name('transportasi.list');
});
Route::controller(AlatBarangFEController::class)->group(function () {
    Route::get('/alatbarang/kalender', 'kalenderAlatBarang');
    Route::get('/alatbarang/list', 'listEventAb')->name('ab.list');
});

Route::get('/promo', [LandingPageController::class, 'promo']);

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

Route::group(["prefix" => "layanan", "as" => "layananTransaksi."], function () {
    Route::controller(LayananFeController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/{slug}', 'detail')->name("detail");
        Route::get('/{slug}/pesan', 'pesanForm')->name("pesan")->middleware("auth");
        Route::post('/beli-langsung', 'pesan')->name('pesan.action')->middleware("auth");
        Route::get('/pembayaran/{codeUnique}', 'pembayaran')->name('pembayaran')->middleware("auth");
    });
});

Route::group(["prefix" => "asrama", "as" => "asramaTransaksi."], function () {
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

Route::controller(DashboardUserController::class)->group(function () {
    Route::group(["middleware" => "auth", "as" => "dashboard.user."], function () {
        Route::get("/dashboard", "index")->name("index");
        Route::get('/invoice', "invoice");
        Route::get('/voucher', "voucher");
        Route::get('/riwayat', "pesanan");
    });
});
