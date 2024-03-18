<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DetailTransaksiGedung;
use App\Models\Gedunglap;
use App\Models\Transaksigedung;

class DetailTransaksiGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_gedung_id' => Transaksigedung::factory(),
            'gedung_lap_id' => Gedunglap::factory(),
        ];
    }
}
