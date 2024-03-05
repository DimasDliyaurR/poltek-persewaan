<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\H_detail_transaksi_gedung;
use App\Models\TransaksiGedung;

class HDetailTransaksiGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HDetailTransaksiGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Transaksi_gedung_id' => TransaksiGedung::factory(),
            'hdtg_sub_total' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
