<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\H_detail_transaksi_asrama;
use App\Models\TransaksiAsrama;

class HDetailTransaksiAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HDetailTransaksiAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Transaksi_asrama_id' => TransaksiAsrama::factory(),
            'hdta_sub_total' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
