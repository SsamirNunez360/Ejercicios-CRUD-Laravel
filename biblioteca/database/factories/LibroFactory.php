<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('LIB-####'),
            'titulo' => rtrim(fake()->sentence(4), '.'),
            'autor' => fake()->name(),
            'anio_publicacion' => fake()->numberBetween(1450, (int) date('Y')),
        ];
    }
}