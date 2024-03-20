<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Layanan;

class LayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Layanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'foto_layanan' => $this->faker->word(),
            'l_nama' => $this->faker->word(),
            'l_tarif' => $this->faker->numberBetween(-10000, 10000),
            'l_personil' => $this->faker->boolean(),
            'l_satuan' => $this->faker->randomElement(["jam","minggu","bulan"]),
            'l_status' => $this->faker->randomElement(["tersedia","tidak"]),
            'l_slug' => $this->faker->word(),
        ];
    }
}
