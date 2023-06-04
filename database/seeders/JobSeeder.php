<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Tag;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::factory(100)->create();

        foreach ($jobs as $job) {
            $job->tag()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}
