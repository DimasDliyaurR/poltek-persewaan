<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Kendaraan\KendaraanService;
use App\Repositories\Asrama\AsramaRepository;
use App\Repositories\Layanan\LayananRepository;
use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\AlatBarang\AlatBarangRepository;
use App\Services\Kendaraan\KendaraanServiceImplement;
use App\Repositories\Asrama\AsramaRepositoryImplement;
use App\Repositories\Kendaraan\MerkKendaraanRepository;
use App\Repositories\Layanan\LayananRepositoryImplement;
use App\Repositories\Kendaraan\KendaraanRepositoryImplement;
use App\Repositories\Layanan\TimLayanan\TimLayananRepository;
use App\Repositories\AlatBarang\AlatBarangRepositoryImplement;
use App\Repositories\Kendaraan\MerkKendaraanRepositoryImplement;
use App\Repositories\Layanan\VideoLayanan\VideoLayananRepository;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepository;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepository;
use App\Repositories\Layanan\TimLayanan\TimLayananRepositoryImplement;
use App\Repositories\Layanan\VideoLayanan\VideoLayananRepositoryImplement;
use App\Repositories\Asrama\FasilitasAsrama\FasilitasAsramaRepositoryImplement;
use App\Repositories\Asrama\TransaksiAsrama\TransaksiAsramaRepositoryImplement;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepository;
use App\Repositories\Asrama\DetailFasilitasAsrama\DetailFasilitasAsramaRepositoryimplement;

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

        /**
         * Bind Kendaraan Service
         */
        $this->app->bind(KendaraanService::class, KendaraanServiceImplement::class);

        /**
         * Bind Asrama Repository And Service
         */
        $this->app->bind(AsramaRepository::class, AsramaRepositoryImplement::class);
        $this->app->bind(FasilitasAsramaRepository::class, FasilitasAsramaRepositoryImplement::class);
        $this->app->bind(DetailFasilitasAsramaRepository::class, DetailFasilitasAsramaRepositoryimplement::class);
        $this->app->bind(TransaksiAsramaRepository::class, TransaksiAsramaRepositoryImplement::class);


        /**
         * Bind Layanan Repository And Service
         */
        $this->app->bind(LayananRepository::class, LayananRepositoryImplement::class);
        $this->app->bind(TimLayananRepository::class, TimLayananRepositoryImplement::class);
        $this->app->bind(VideoLayananRepository::class, VideoLayananRepositoryImplement::class);

        /**
         * Bind Alat Barang Repository And Service
         */
        $this->app->bind(AlatBarangRepository::class, AlatBarangRepositoryImplement::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
