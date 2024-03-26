<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Layanan;
use App\Models\TimLayanan;

class TimLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'layanan_id' => Layanan::factory(),
            'tl_nama' => $this->faker->word(),
            'tl_status' => $this->faker->randomElement(["tersedia","tidak"]),
            'tl_deskripsi' => $this->faker->word(),
        ];
    }
}
