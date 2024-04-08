<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTransaksiKendaraan;
use App\Models\Kendaraan;
use App\Models\MerkKendaraan;
use App\Models\TransaksiKendaraan;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
