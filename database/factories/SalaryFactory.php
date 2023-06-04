<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Job;
use App\Models\Periodicity;
use App\Models\SalaryType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'min' => fake()->numberBetween(1000, 10000),
            'max' => fake()->numberBetween(10000, 100000),

            'job_id' => Job::all()->random()->id,
            'currency_id' => Currency::all()->random()->id,
            'salary_type_id' => SalaryType::all()->random()->id,
            'periodicity_id' => Periodicity::all()->random()->id,
        ];
    }
}
