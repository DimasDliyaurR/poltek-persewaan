<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\HDetailTransaksiGedung;
use App\Models\PropertyGedung;
use App\Models\R_detail_transaksi_gedung;

class RDetailTransaksiGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_transaksi_id' => HDetailTransaksiGedung::factory(),
            'Property_gedung_id' => PropertyGedung::factory(),
        ];
    }
}
