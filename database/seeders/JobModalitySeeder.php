<?php

namespace Database\Seeders;

use App\Models\JobModality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $jobModality = JobModality::factory(4)->create();

        $jobModalities = [
            [
                'id' => 1,
                'title' => 'Remote',
                'description' => 'Remote job'
            ],
            [
                'id' => 2,
                'title' => 'Presential',
                'description' => 'Presential job'
            ],
            [
                'id' => 3,
                'title' => 'Mixed',
                'description' => 'Mixed job type'
            ]
        ];

        foreach ($jobModalities as $jobModality) {
            JobModality::factory()->create($jobModality);
        }
    }
}
