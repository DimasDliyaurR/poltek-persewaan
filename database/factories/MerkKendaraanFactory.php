<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Merk_kendaraan;

class MerkKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MerkKendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'mk_foto' => $this->faker->word(),
            'mk_merk' => $this->faker->word(),
            'mk_seri' => $this->faker->word(),
            'mk_tarif' => $this->faker->randomFloat(2, 0, 999999.99),
            'mk_kapasitas' => $this->faker->word(),
            'mk_deskripsi' => $this->faker->text(),
            'mk_bahan_bakar' => $this->faker->word(),
        ];
    }
}
