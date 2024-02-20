<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Gender;
use App\Models\JobModality;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'username' => fake()->unique()->userName(),
            'avatar' => fake()->imageUrl(),
            'cover_photo' => fake()->imageUrl(),
            'job_title' => fake()->jobTitle(),
            'slug' => fake()->slug(),
            'email' => fake()->unique()->safeEmail(),

            'looking_for_job' => fake()->boolean(),
            'phone' => fake()->phoneNumber(),
            'about_me' => fake()->paragraph(),
            'linkedin' => fake()->url(),
            'birthdate' => fake()->date(),
            'cv' => fake()->url(),
            'job_modality_id' => JobModality::all()->random()->id,
            'gender_id' => Gender::all()->random()->id,

            'country_id' => Country::all()->random()->id,
            'state_id' => State::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'role_id' => 2,

            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
