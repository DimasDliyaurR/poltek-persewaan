<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;
use App\Models\DetailFasilitasAsrama;
use App\Models\Fasilitasasrama;

class DetailFasilitasAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailFasilitasAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'asrama_id' => Asrama::factory(),
            'fasilitas_asrama_id' => Fasilitasasrama::factory(),
        ];
    }
}
