<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FasilitasAsrama;
use App\Models\HDetailTransaksiAsrama;
use App\Models\R_detail_transaksi_fasilitas;

class RDetailTransaksiFasilitasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiFasilitas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_fasilitas_id' => HDetailTransaksiAsrama::factory(),
            'Fasilitas_asrama_id' => FasilitasAsrama::factory(),
        ];
    }
}
