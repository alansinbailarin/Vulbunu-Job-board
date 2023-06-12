<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\JobModality;
use App\Models\Priority;
use App\Models\Seniority;
use App\Models\State;
use App\Models\User;
use App\Models\Workday;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'extra_info' => fake()->paragraph(),
            'apply_on' => fake()->url(),
            'color' => fake()->randomElement(['red', 'blue', 'green', 'yellow', 'purple', 'pink', 'indigo', 'gray']),
            'clicks' => fake()->numberBetween(0, 10000),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
            'featured' => fake()->boolean(),

            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'seniority_id' => Seniority::all()->random()->id,
            'job_modality_id' => JobModality::all()->random()->id,
            'workday_id' => Workday::all()->random()->id,
            'priority_id' => Priority::all()->random()->id,
            'country_id' => Country::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'city_id' => City::all()->random()->id,
        ];
    }
}
