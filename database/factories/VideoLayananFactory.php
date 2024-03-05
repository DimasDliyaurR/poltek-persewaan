<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Layanan;
use App\Models\Video_layanan;

class VideoLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VideoLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Layanan_id' => Layanan::factory(),
            'vl_link' => $this->faker->word(),
        ];
    }
}
