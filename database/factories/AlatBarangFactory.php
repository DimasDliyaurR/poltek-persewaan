<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AlatBarang;

class AlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {

        return [
            'a_nama' => $this->faker->word(),
            'a_foto' => $this->faker->word(),
            'a_keterangan' => $this->faker->word(),
            'a_tarif' => $this->faker->word(),
            'a_status' => $this->faker->randomElement(["tersedia", "tidak"]),
            'a_satuan' => $this->faker->word(),
            'a_slug' => $this->faker->word(),
        ];
    }
}
