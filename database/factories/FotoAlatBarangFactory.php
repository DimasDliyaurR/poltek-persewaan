<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alatbarang;
use App\Models\FotoAlatBarang;

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
            'alat_barang_id' => Alatbarang::factory(),
            'fab_foto' => $this->faker->word(),
        ];
    }
}
