<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DetailTransaksiPropertyGedung;
use App\Models\Propertygedung;
use App\Models\Transaksigedung;

class DetailTransaksiPropertyGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiPropertyGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_gedung_id' => Transaksigedung::factory(),
            'property_gedung_id' => Propertygedung::factory(),
            'qty' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
