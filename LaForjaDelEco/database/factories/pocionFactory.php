<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\pocion;
class pocionFactory extends Factory
{
    protected $model = pocion::class;


    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                "Poción de velocidad",
                "Poción de rapidez",
                "Poción de fuerza",
                "Poción de curación",
                "Poción de regeneración",
                "Poción de invisibilidad",
                "Poción de visión nocturna",
                "Poción de salto",
                "Poción de resistencia al fuego",
                "Poción de respiración acuática",
                "Poción de lentitud",
                "Poción de veneno",
                "Poción de daño instantáneo",
                "Poción de debilidad",
                "Poción de caída lenta",
                "Poción de la tortuga maestra"
            ]),
            'imagen' => $this->faker->imageUrl(),
            'duracion' => $this->faker->numberBetween(0,1000),
            'efecto' => $this->faker->numberBetween(0,100),
            'tamano' => $this->faker->numberBetween(0,100),
            'receta' => $this->faker->numberBetween(0,100),
            'peso' => $this->faker->numberBetween(0,100),
        ];
    }
}
