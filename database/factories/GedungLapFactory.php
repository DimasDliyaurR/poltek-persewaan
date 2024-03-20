<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\GedungLap;

class GedungLapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GedungLap::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'gl_foto' => $this->faker->word(),
            'gl_nama' => $this->faker->word(),
            'gl_keterangan' => $this->faker->word(),
            'gl_tarif' => $this->faker->word(),
            'gl_satuan_gedung' => $this->faker->word(),
            'gl_kapasitas_gedung' => $this->faker->numberBetween(-10000, 10000),
            'gl_ukuran_gedung' => $this->faker->word(),
            'gl_slug' => $this->faker->word(),
        ];
    }
}
