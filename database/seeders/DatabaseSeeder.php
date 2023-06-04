<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(10)->create();
        // \App\Models\Job::factory(100)->create();
        \App\Models\Seniority::factory(4)->create();
        \App\Models\JobModality::factory(4)->create();
        \App\Models\Workday::factory(4)->create();
        \App\Models\Tag::factory(20)->create();
        $this->call(JobSeeder::class);
        \App\Models\Currency::factory(4)->create();
        \App\Models\SalaryType::factory(4)->create();
        \App\Models\Periodicity::factory(4)->create();
        \App\Models\Salary::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
