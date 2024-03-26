<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;
use App\Models\DetailTransaksiAsrama;
use App\Models\Transaksiasrama;

class DetailTransaksiAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_asrama_id' => Transaksiasrama::factory(),
            'asrama_id' => Asrama::factory(),
        ];
    }
}
