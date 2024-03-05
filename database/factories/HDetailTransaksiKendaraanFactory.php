<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\H_detail_transaksi_kendaraan;
use App\Models\TransaksiKendaraan;

class HDetailTransaksiKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HDetailTransaksiKendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Transaksi_kendaraan_id' => TransaksiKendaraan::factory(),
            'hdtk_sub_total' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
