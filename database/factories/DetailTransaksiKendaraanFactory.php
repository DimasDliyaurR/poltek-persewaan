<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Detail_transaksi_kendaraan;
use App\Models\Kendaraan;
use App\Models\TransaksiKendaraan;

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
            'Transaksi_kendaraan_id' => TransaksiKendaraan::factory(),
            'Kendaraan_id' => Kendaraan::factory(),
            'hdtk_sub_total' => $this->faker->numberBetween(-10000, 10000),
            'kendaraan_id' => Kendaraan::factory(),
        ];
    }
}
