<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Kendaraan\KendaraanService;
use App\Repositories\Asrama\AsramaRepository;
use App\Repositories\Layanan\LayananRepository;
use App\Repositories\GedungLap\GedungLapRepository;
use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\AlatBarang\AlatBarangRepository;
use App\Services\Kendaraan\KendaraanServiceImplement;
use App\Repositories\Asrama\AsramaRepositoryImplement;
use App\Repositories\Kendaraan\MerkKendaraanRepository;
use App\Repositories\Layanan\LayananRepositoryImplement;
use App\Repositories\GedungLap\GedungLapRepositoryImplement;
use App\Repositories\Kendaraan\KendaraanRepositoryImplement;
use App\Repositories\Layanan\TimLayanan\TimLayananRepository;
use App\Repositories\AlatBarang\AlatBarangRepositoryImplement;
use App\Repositories\Kendaraan\MerkKendaraanRepositoryImplement;
use App\Repositories\Layanan\VideoLayanan\VideoLayananRepository;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepository;
use App\Repositories\Layanan\TimLayanan\TimLayananRepositoryImplement;
use App\Repositories\GedungLap\PropertyGedung\PropertyGedungRepository;
use App\Repositories\AlatBarang\FotoAlatBarang\FotoAlatBarangRepository;
use App\Repositories\GedungLap\TransaksiGedung\TransaksiGedungRepository;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepository;
use App\Repositories\Layanan\VideoLayanan\VideoLayananRepositoryImplement;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepositoryImplement;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepositoryImplement;
use App\Repositories\Kendaraan\TransaksiKendaraan\TransaksiKendaraanRepository;
use App\Repositories\GedungLap\PropertyGedung\PropertyGedungRepositoryImplement;
use App\Repositories\AlatBarang\FotoAlatBarang\FotoAlatBarangRepositoryImplement;
use App\Repositories\AlatBarang\TransaksiAlatBarang\TransaksiAlatBarangRepository;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepository;
use App\Repositories\Asrama\DetailTransaksiAsrama\DetailTransaksiAsramaRepository;
use App\Repositories\GedungLap\TransaksiGedung\TransaksiGedungRepositoryImplement;
use App\Repositories\Layanan\TransaksiLayanan\TransaksiLayananRepositoryImplement;
use App\Repositories\GedungLap\DetailTransaksiGedung\DetailTransaksiGedungRepository;
use App\Repositories\Layanan\DetailTransaksiLayanan\DetailTransaksiLayananRepository;
use App\Repositories\Kendaraan\TransaksiKendaraan\TransaksiKendaraanRepositoryImplement;
use App\Repositories\AlatBarang\TransaksiAlatBarang\TransaksiAlatBarangRepositoryImplement;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepositoryimplement;
use App\Repositories\Asrama\DetailTransaksiAsrama\DetailTransaksiAsramaRepositoryImplement;
use App\Repositories\Kendaraan\DetailTransaksiKendaraan\DetailTransaksiKendaraanRepository;
use App\Repositories\AlatBarang\DetailTransaksiAlatBarang\DetailTransaksiAlatBarangRepository;
use App\Repositories\GedungLap\DetailTransaksiGedung\DetailTransaksiGedungRepositoryImplement;
use App\Repositories\Layanan\DetailTransaksiLayanan\DetailTransaksiLayananRepositoryImplement;
use App\Repositories\Kendaraan\DetailTransaksiKendaraan\DetailTransaksiKendaraanRepositoryImplement;
use App\Repositories\GedungLap\DetailTransaksiPropertyGedung\DetailTransaksiPropertyGedungRepository;
use App\Repositories\AlatBarang\DetailTransaksiAlatBarang\DetailTransaksiAlatBarangRepositoryImplement;
use App\Repositories\GedungLap\DetailTransaksiPropertyGedung\DetailTransaksiPropertyGedungRepositoryImplement;
use App\Services\Asrama\AsramaService;
use App\Services\Asrama\AsramaServiceImplement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Bind Kendaraan Repository
         */
        $this->app->bind(KendaraanRepository::class, KendaraanRepositoryImplement::class);
        $this->app->bind(MerkKendaraanRepository::class, MerkKendaraanRepositoryImplement::class);
        $this->app->bind(TransaksiKendaraanRepository::class, TransaksiKendaraanRepositoryImplement::class);
        $this->app->bind(DetailTransaksiKendaraanRepository::class, DetailTransaksiKendaraanRepositoryImplement::class);

        /**
         * Bind Asrama Repository And Service
         */
        $this->app->bind(AsramaRepository::class, AsramaRepositoryImplement::class);
        $this->app->bind(FasilitasAsramaRepository::class, FasilitasAsramaRepositoryImplement::class);
        $this->app->bind(DetailFasilitasAsramaRepository::class, DetailFasilitasAsramaRepositoryimplement::class);
        $this->app->bind(TransaksiAsramaRepository::class, TransaksiAsramaRepositoryImplement::class);
        $this->app->bind(DetailTransaksiAsramaRepository::class, DetailTransaksiAsramaRepositoryImplement::class);


        /**
         * Bind Layanan Repository And Service
         */
        $this->app->bind(LayananRepository::class, LayananRepositoryImplement::class);
        $this->app->bind(TimLayananRepository::class, TimLayananRepositoryImplement::class);
        $this->app->bind(VideoLayananRepository::class, VideoLayananRepositoryImplement::class);
        $this->app->bind(TransaksiLayananRepository::class, TransaksiLayananRepositoryImplement::class);
        $this->app->bind(DetailTransaksiLayananRepository::class, DetailTransaksiLayananRepositoryImplement::class);

        /**
         * Bind Alat Barang Repository And Service
         */
        $this->app->bind(AlatBarangRepository::class, AlatBarangRepositoryImplement::class);
        $this->app->bind(FotoAlatBarangRepository::class, FotoAlatBarangRepositoryImplement::class);
        $this->app->bind(TransaksiAlatBarangRepository::class, TransaksiAlatBarangRepositoryImplement::class);
        $this->app->bind(DetailTransaksiAlatBarangRepository::class, DetailTransaksiAlatBarangRepositoryImplement::class);

        /**
         * Bind Gedung dan Lapangan Repository
         */
        $this->app->bind(GedungLapRepository::class, GedungLapRepositoryImplement::class);
        $this->app->bind(PropertyGedungRepository::class, PropertyGedungRepositoryImplement::class);
        $this->app->bind(TransaksiGedungRepository::class, TransaksiGedungRepositoryImplement::class);
        $this->app->bind(DetailTransaksiPropertyGedungRepository::class, DetailTransaksiPropertyGedungRepositoryImplement::class);
        $this->app->bind(DetailTransaksiGedungRepository::class, DetailTransaksiGedungRepositoryImplement::class);

        /**
         * Bind Kendaraan Service
         */
        $this->app->bind(KendaraanService::class, KendaraanServiceImplement::class);

        /**
         * Bind Kendaraan Service
         */
        $this->app->bind(AsramaService::class, AsramaServiceImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
