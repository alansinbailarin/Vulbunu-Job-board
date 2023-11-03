<?php

namespace Database\Seeders;

use App\Models\Periodicity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $periodicity = Periodicity::factory(4)->create();

        $periodicities = [
            [
                'id' => 1,
                'title' => 'Daily',
            ],
            [
                'id' => 2,
                'title' => 'Weekly',
            ],
            [
                'id' => 3,
                'title' => 'Biweekly',
            ],
            [
                'id' => 4,
                'title' => 'Monthly',
            ],
            [
                'id' => 5,
                'title' => 'Bimonthly',
            ],
            [
                'id' => 6,
                'title' => 'Quarterly',
            ],
            [
                'id' => 7,
                'title' => 'Semiannually',
            ],
            [
                'id' => 8,
                'title' => 'Annually',
            ],
            [
                'id' => 9,
                'title' => 'Biannually',
            ],
            [
                'id' => 10,
                'title' => 'One-time',
            ]
        ];

        foreach ($periodicities as $periodicity) {
            Periodicity::factory()->create($periodicity);
        }
    }
}
