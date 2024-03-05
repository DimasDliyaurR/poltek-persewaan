<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama;
use App\Models\Detail_fasilitas_asrama;
use App\Models\FasilitasAsrama;

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
            'Asrama_id' => Asrama::factory(),
            'Fasilitas_asrama_id' => FasilitasAsrama::factory(),
        ];
    }
}
