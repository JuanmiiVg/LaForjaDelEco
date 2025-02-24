<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\caracteristicas;

class caracteristicasFactory extends Factory
{
    protected $model = caracteristicas::class;
    public function definition(): array
    {
        return [
            'vigor' => $this->faker->numberBetween(0,100),
            'aguante' => $this->faker->numberBetween(0,100),
            'fuerza' => $this->faker->numberBetween(0,100),
            'destreza' => $this->faker->numberBetween(0,100),
            'inteligencia' => $this->faker->numberBetween(0,100),
            'arcano' => $this->faker->numberBetween(0,100),
        ];
    }
}
