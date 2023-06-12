<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaryType>
 */
class SalaryTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Salario base', 'Por comision', 'Por venta', 'Por hora']), // 'Salario base', 'Por comision', 'Por venta', 'Por hora
            // 'type' => fake()->randomElement(['Salario base', 'Por comision', 'Por venta', 'Por hora']),
        ];
    }
}
