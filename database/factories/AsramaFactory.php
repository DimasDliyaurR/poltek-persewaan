<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;

class AsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'a_nama_ruangan' => $this->faker->word(),
            'a_foto' => $this->faker->word(),
            'a_slug' => $this->faker->word(),
            'a_status' => $this->faker->randomElement(["tersedia","tidak"]),
            'a_tarif' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
