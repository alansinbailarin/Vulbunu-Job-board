<?php

namespace Database\Seeders;

use App\Models\Workday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $workday = Workday::factory(4)->create();

        $workdays = [
            [
                'id' => 1,
                'title' => 'Full-time',
                'description' => 'Full-time job'
            ],
            [
                'id' => 2,
                'title' => 'Part-time',
                'description' => 'Part-time job'
            ],
            [
                'id' => 3,
                'title' => 'Freelance',
                'description' => 'Freelance job'
            ],
            [
                'id' => 4,
                'title' => 'Internship',
                'description' => 'Internship job'
            ],
            [
                'id' => 5,
                'title' => 'Temporary',
                'description' => 'Temporary job'
            ],
            [
                'id' => 6,
                'title' => 'Volunteer',
                'description' => 'Volunteer job'
            ],
            [
                'id' => 7,
                'title' => 'Contract',
                'description' => 'Contract job'
            ],
            [
                'id' => 8,
                'title' => 'Commission',
                'description' => 'Commission job'
            ],
        ];

        foreach ($workdays as $workday) {
            Workday::factory()->create($workday);
        }
    }
}
