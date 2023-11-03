<?php

namespace Database\Seeders;

use App\Models\Seniority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SenioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $seniority = Seniority::factory(4)->create();

        $seniorities = [
            [
                'id' => 1,
                'title' => 'Junior',
                'description' => 'Junior'
            ],
            [
                'id' => 2,
                'title' => 'Semi-senior',
                'description' => 'Semi-senior'
            ],
            [
                'id' => 3,
                'title' => 'Senior',
                'description' => 'Senior'
            ],
            [
                'id' => 4,
                'title' => 'Master',
                'description' => 'Master'
            ],
            [
                'id' => 5,
                'title' => 'Director',
                'description' => 'Director'
            ],
            [
                'id' => 6,
                'title' => 'CEO',
                'description' => 'CEO'
            ],
            [
                'id' => 7,
                'title' => 'CTO',
                'description' => 'CTO'
            ],
            [
                'id' => 8,
                'title' => 'COO',
                'description' => 'COO'
            ],
            [
                'id' => 9,
                'title' => 'CFO',
                'description' => 'CFO'
            ]
        ];

        foreach ($seniorities as $seniority) {
            Seniority::factory()->create($seniority);
        }
    }
}
