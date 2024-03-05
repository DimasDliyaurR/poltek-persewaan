<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AlatBarang;
use App\Models\foto_alat_barang;

class FotoAlatBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FotoAlatBarang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Alat_barang_id' => AlatBarang::factory(),
            'fab_foto' => $this->faker->word(),
        ];
    }
}
