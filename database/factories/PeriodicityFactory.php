<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodicity>
 */
class PeriodicityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'period' => fake()->randomElement(['Mensual', 'Semanal', 'Quincenal', 'Diario']),
            'title' => fake()->randomElement(['Mensual', 'Semanal', 'Quincenal', 'Diario', 'Anual']), // 
        ];
    }
}
