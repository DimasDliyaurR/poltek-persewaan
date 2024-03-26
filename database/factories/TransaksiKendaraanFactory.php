<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TransaksiKendaraan;
use App\Models\User;

class TransaksiKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiKendaraan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'foto_sim' => $this->faker->word(),
            'tk_durasi' => $this->faker->word(),
            'tk_tanggal_sewa' => $this->faker->dateTime(),
            'tk_tanggal_kembali' => $this->faker->dateTime(),
        ];
    }
}
