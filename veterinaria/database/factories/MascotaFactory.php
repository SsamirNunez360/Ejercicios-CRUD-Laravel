<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('MAS-####'),
            'nombre' => fake()->firstName(),
            'especie' => fake()->randomElement(Mascota::ESPECIES),
            'propietario' => fake()->name(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-15 years', 'now')->format('Y-m-d'),
        ];
    }
}