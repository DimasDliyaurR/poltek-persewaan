<?php

namespace App\Providers;

use App\Repositories\AlatBarang\AlatBarangRepository;
use App\Repositories\AlatBarang\AlatBarangRepositoryImplement;
use App\Repositories\Asrama\AsramaRepository;
use App\Repositories\Asrama\AsramaRepositoryImplement;
use App\Repositories\FasilitasAsrama\FasilitasAsramaRepository;
use App\Repositories\FasilitasAsrama\FasilitasAsramaRepositoryImplement;
use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\Kendaraan\KendaraanRepositoryImplement;
use App\Repositories\Layanan\LayananRepository;
use App\Repositories\Layanan\LayananRepositoryImplement;
use App\Services\Kendaraan\KendaraanService;
use App\Services\Kendaraan\KendaraanServiceImplement;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Bind Kendaraan Repository And Service
         */
        $this->app->bind(KendaraanRepository::class, KendaraanRepositoryImplement::class);
        $this->app->bind(KendaraanService::class, KendaraanServiceImplement::class);

        /**
         * Bind Asrama Repository And Service
         */
        $this->app->bind(AsramaRepository::class, AsramaRepositoryImplement::class);

        /**
         * Bind Fasilitas Asrama Repository
         */
        $this->app->bind(FasilitasAsramaRepository::class, FasilitasAsramaRepositoryImplement::class);

        /**
         * Bind Layanan Repository And Service
         */
        $this->app->bind(LayananRepository::class, LayananRepositoryImplement::class);

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
