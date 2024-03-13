<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TransaksiLayanan;
use App\Models\User;

class TransaksiLayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiLayanan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'tl_tanggal_sewa' => $this->faker->dateTime(),
            'tl_tanggal_pelaksanaan' => $this->faker->dateTime(),
            'tl_durasi_sewa' => $this->faker->time(),
            'tl_tujuan' => $this->faker->word(),
            'tl_is_only_property' => $this->faker->boolean(),
        ];
    }
}
