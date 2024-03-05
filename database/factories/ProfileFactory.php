<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'User_id' => User::factory(),
            'nama_lengkap' => $this->faker->word(),
            'foto_ktp' => $this->faker->word(),
            'alamat' => $this->faker->text(),
            'no_telp' => $this->faker->word(),
        ];
    }
}
