<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\H_detail_transaksi_alat_barang;
use App\Models\TransaksiAlatBarang;

class HDetailTransaksiAlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HDetailTransaksiAlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Transaksi_alat_barang_id' => TransaksiAlatBarang::factory(),
            'hdtab_sub_total' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
