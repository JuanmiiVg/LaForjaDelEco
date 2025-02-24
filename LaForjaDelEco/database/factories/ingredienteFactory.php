<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ingrediente;

class ingredienteFactory extends Factory
{

    protected $model = ingrediente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                "Escamas de dragón",
                "Polvo de hada",
                "Raíz de mandrágora",
                "Lágrimas de fénix",
                "Flor de luna",
                "Colmillo de basilisco",
                "Hongo susurrante",
                "Sangre de unicornio",
                "Pluma de grifo",
                "Esencia de sombra"
            ]),
            'imagen' => $this->faker->imageUrl(),
            'peso' => $this->faker->randomDigitNotNull,
        ];
    }
}
