<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_cuenta' => fake()->unique()->numerify('2023#######'),
            'nombre' => fake()->name(),
            'correo' => fake()->unique()->safeEmail(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-30 years', '-17 years')->format('Y-m-d'),
        ];
    }
}