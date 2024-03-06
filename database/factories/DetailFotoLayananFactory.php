<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Detail_foto_layanan;
use App\Models\Layanan;

class DetailFotoLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailFotoLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Layanan_id' => Layanan::factory(),
            'dfl_foto' => $this->faker->word(),
        ];
    }
}
