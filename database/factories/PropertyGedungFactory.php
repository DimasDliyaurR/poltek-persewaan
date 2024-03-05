<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Property_gedung;

class PropertyGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pg_nama' => $this->faker->word(),
            'pg_status' => $this->faker->randomElement(["tersedia","tidak"]),
        ];
    }
}
