<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AlatBarang;
use App\Models\HDetailTransaksiAlatBarang;
use App\Models\R_detail_transaksi_alat_barang;

class RDetailTransaksiAlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RDetailTransaksiAlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'detail_transaksi_id' => HDetailTransaksiAlatBarang::factory(),
            'Alat_barang_id' => AlatBarang::factory(),
        ];
    }
}
