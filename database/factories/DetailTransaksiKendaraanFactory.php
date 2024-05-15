<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DetailTransaksiKendaraan;
use App\Models\Kendaraan;
use App\Models\Transaksikendaraan;

class DetailTransaksiKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiKendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_kendaraan_id' => $this->faker->numberBetween(1, 10),
            'kendaraan_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
