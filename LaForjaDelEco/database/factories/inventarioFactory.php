<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\inventario;

class inventarioFactory extends Factory
{

    protected $model = inventario::class;

    public function definition(): array
    {
        return [
            'cargaMax' => $this->faker->numberBetween(0,100),
        ];
    }
}
