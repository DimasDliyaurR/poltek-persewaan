<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Transaksi_gedung;
use App\Models\User;

class TransaksiGedungFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiGedung::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'User_id' => User::factory(),
            'tg_tujuan' => $this->faker->word(),
            'tg_tanggal_sewa' => $this->faker->dateTime(),
            'tg_tanggal_kembali' => $this->faker->dateTime(),
            'tg_tanggal_pelaksanaan' => $this->faker->dateTime(),
        ];
    }
}
