<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\material;

class materialFactory extends Factory
{
    protected $model = material::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
            "Roble",
            "Abedul",
            "Acacia",
            "Jungla",
            "Abeto",
            "Hierro",
            "Oro",
            "Diamante",
            "Esmeralda",
            "Cuarzo",
          ]),
            'imagen' => $this->faker->imageUrl,
            'peso' => $this->faker->randomDigitNotNull,      
        ];
    }
}
