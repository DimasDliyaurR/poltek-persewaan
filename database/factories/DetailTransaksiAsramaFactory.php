<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;
use App\Models\Detail_transaksi_asrama;
use App\Models\TransaksiAsrama;

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
            'Transaksi_asrama_id' => TransaksiAsrama::factory(),
            'Asrama_id' => Asrama::factory(),
        ];
    }
}
