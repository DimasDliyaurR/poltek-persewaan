<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Asrama;
use App\Models\Profile;
use App\Models\Kendaraan;
use App\Models\TipeAsrama;
use Illuminate\Support\Str;
use App\Models\MerkKendaraan;
use App\Models\FasilitasAsrama;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\AsramaPaymentMethod;
use App\Models\DetailFasilitasAsrama;
use App\Models\DetailTransaksiKendaraan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Kendaraan
         */
        $this->call(MerkKendaraansTableSeeder::class);
        $this->call(MerkKendaraanPaymentMethodsTableSeeder::class);
        $this->call(KendaraansTableSeeder::class);
        /**
         * Layanan
         */
        $this->call(LayanansTableSeeder::class);
        $this->call(TimLayanansTableSeeder::class);
        $this->call(VideoLayanansTableSeeder::class);
        $this->call(DetailFotoLayanansTableSeeder::class);
        $this->call(LayananPaymentMethodsTableSeeder::class);
        /**
         * Gedung Lapangan
         */
        $this->call(GedungLapsTableSeeder::class);
        $this->call(DetailFotoGedungLapsTableSeeder::class);
        $this->call(GedungLapPaymentMethodsTableSeeder::class);
        /**
         * Asrama
         */
        $this->call(TipeAsramasTableSeeder::class);
        $this->call(AsramasTableSeeder::class);
        $this->call(FasilitasAsramasTableSeeder::class);
        $this->call(DetailFasilitasAsramasTableSeeder::class);
        $this->call(DetailFotoTipeAsramasTableSeeder::class);
        $this->call(AsramaPaymentMethodsTableSeeder::class);
        /**
         * Alat Barang
         */
        $this->call(SatuanAlatBarangsTableSeeder::class);
        $this->call(AlatBarangsTableSeeder::class);
        $this->call(FotoAlatBarangsTableSeeder::class);
        $this->call(AlatBarangPaymentMethodsTableSeeder::class);
    }
}
