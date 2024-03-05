<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Transaksi_alat_barang;
use App\Models\User;

class TransaksiAlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiAlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'User_id' => User::factory(),
            'a_nama' => $this->faker->word(),
            'a_foto' => $this->faker->word(),
            'a_keterangan' => $this->faker->word(),
            'a_tarif' => $this->faker->randomFloat(2, 0, 99999999.99),
            'a_status' => $this->faker->randomElement(["tersedia","tidak"]),
            'a_satuan' => $this->faker->word(),
        ];
    }
}
