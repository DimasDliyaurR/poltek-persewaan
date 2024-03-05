<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asrama_id;

class AsramaIdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AsramaId::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            's_nama_ruangan' => $this->faker->word(),
            's_status' => $this->faker->randomElement(["tersedia","tidak"]),
            's_tarif' => $this->faker->randomFloat(2, 0, 99999999.99),
        ];
    }
}
