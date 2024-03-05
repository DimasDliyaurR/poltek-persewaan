<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\HDetailTransaksiLayanan;
use App\Models\R_detail_transaksi_layanan;
use App\Models\TransaksiLayanan;

class RDetailTransaksiLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_transaksi_id' => HDetailTransaksiLayanan::factory(),
            'Transaksi_layanan_id' => TransaksiLayanan::factory(),
        ];
    }
}
