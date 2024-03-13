<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FasilitasAsrama;

class FasilitasAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FasilitasAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fa_icon' => $this->faker->word(),
            'fa_nama' => $this->faker->word(),
            'fa_status' => $this->faker->randomElement(["tersedia","tidak"]),
        ];
    }
}
