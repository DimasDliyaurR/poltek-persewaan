<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TransaksiAsrama;
use App\Models\User;

class TransaksiAsramaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiAsrama::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'ta_tanggal_sewa' => $this->faker->dateTime(),
            'ta_check_in' => $this->faker->dateTime(),
            'ta_check_out' => $this->faker->dateTime(),
            'ta_is_sarapan' => $this->faker->boolean(),
        ];
    }
}
