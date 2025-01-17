<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kendaraan;
use App\Models\Merkkendaraan;

class KendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'merk_kendaraan_id' => Merkkendaraan::factory(),
            'k_plat' => $this->faker->word(),
            'k_status' => $this->faker->randomElement(["tersedia","tidak"]),
            'k_slug' => $this->faker->word(),
        ];
    }
}
