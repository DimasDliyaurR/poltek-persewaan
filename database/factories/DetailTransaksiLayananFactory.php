<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DetailTransaksiLayanan;
use App\Models\Layanan;
use App\Models\Transaksilayanan;

class DetailTransaksiLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_layanan_id' => Transaksilayanan::factory(),
            'layanan_id' => Layanan::factory(),
        ];
    }
}
