<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alatbarang;
use App\Models\DetailTransaksiAlatBarang;
use App\Models\Transaksialatbarang;

class DetailTransaksiAlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaksiAlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'transaksi_alat_barang_id' => Transaksialatbarang::factory(),
            'alat_barang_id' => Alatbarang::factory(),
        ];
    }
}
