<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $priority = Priority::factory(4)->create();

        $priorities = [
            [
                'id' => 1,
                'title' => 'Low',
            ],
            [
                'id' => 2,
                'title' => 'Medium',
            ],
            [
                'id' => 3,
                'title' => 'High',
            ],
            [
                'id' => 4,
                'title' => 'Urgent',
            ],
            [
                'id' => 5,
                'title' => 'Immediate',
            ],
        ];

        foreach ($priorities as $priority) {
            Priority::factory()->create($priority);
        }
    }
}
