<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\H_detail_transaksi_layanan;
use App\Models\TransaksiLayanan;

class HDetailTransaksiLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HDetailTransaksiLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Transaksi_layanan_id' => TransaksiLayanan::factory(),
            'hdtl_sub_total' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
