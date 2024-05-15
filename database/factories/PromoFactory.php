<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'p_judul' =>$this->faker->word(),
            "p_foto" =>$this->faker->word(),
            "p_kode" =>$this->faker->word(),
            "p_isi" =>$this->faker->randomNumber(),
            "p_tipe" =>$this->faker->randomElement(["fixed", "percent"]),
            "p_is_umum" =>$this->faker->randomNumber(),
            "p_is_aktif" =>$this->faker->randomNumber(),
            "p_deskripsi"=>$this->faker->sentence(),
            "p_mulai" =>$this->faker->dateTime(),
            "p_kadaluarsa" =>$this->faker->dateTime(),
            "p_jumlah" =>$this->faker->randomNumber(),
            "p_kategori" =>$this->faker->word(),
        ];
    }
}
