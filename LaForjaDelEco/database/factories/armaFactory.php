<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\arma;
class armaFactory extends Factory
{
    protected $model = arma::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'imagen' => $this->faker->imageUrl,
            'categoria' => $this->faker->randomElement([
            "Espada",
            "Hacha",
            "Arco",
            "Baston",
            "Escudo",
            ]),
            'tamano' => $this->faker->randomDigitNotNull,
            'dano' => $this->faker->randomDigitNotNull,
        ];
    }
}
