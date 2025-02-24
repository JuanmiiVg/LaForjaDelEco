<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\personaje;
use App\Models\master;
use App\Models\caracteristicas;

class personajeFactory extends Factory
{
    protected $model = personaje::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'imagen' => $this->faker->imageUrl,
            'rubies' => $this->faker->randomDigitNotNull,
            'Mderecha' => $this->faker->randomDigitNotNull,
            'Mizquierda' => $this->faker->randomDigitNotNull,
            'master_id' => null,
            'caracteristicas_id' => null,
            'inventario_id' => null,
        ];
    }
}
