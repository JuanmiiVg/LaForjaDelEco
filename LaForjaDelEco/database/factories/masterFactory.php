<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\master;
class masterFactory extends Factory
{
  
    protected $model = master::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'imagen' => $this->faker->imageUrl(),
        ];
    }
}
