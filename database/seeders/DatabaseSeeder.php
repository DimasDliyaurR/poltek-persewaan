<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Kendaraan;
use App\Models\MerkKendaraan;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use App\Models\TransaksiKendaraan;
use App\Models\DetailTransaksiKendaraan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        MerkKendaraan::factory(10)->create();
        Kendaraan::factory(10)->create();
        TransaksiKendaraan::factory(10)->create();
        DetailTransaksiKendaraan::factory(10)->create();
        Promo::factory(10)->create();
        
        $this->call([
            EventSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
