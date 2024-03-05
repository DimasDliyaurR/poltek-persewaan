<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;
use App\Models\HDetailTransaksiAsrama;
use App\Models\R_detail_transaksi_asrama;

class RDetailTransaksiAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_transaksi_id' => HDetailTransaksiAsrama::factory(),
            'Asrama_id' => Asrama::factory(),
        ];
    }
}
