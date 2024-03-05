<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\HDetailTransaksiKendaraan;
use App\Models\Kendaraan;
use App\Models\R_detail_transaksi_kendaraan;

class RDetailTransaksiKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiKendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_transaksi_id' => HDetailTransaksiKendaraan::factory(),
            'Kendaraan_id' => Kendaraan::factory(),
        ];
    }
}
