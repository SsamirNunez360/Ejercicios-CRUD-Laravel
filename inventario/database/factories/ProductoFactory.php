<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('PROD-####'),
            'nombre' => ucfirst(fake()->words(2, true)),
            'precio' => fake()->randomFloat(2, 1, 5000),
            'existencias' => fake()->numberBetween(0, 50),
        ];
    }
}