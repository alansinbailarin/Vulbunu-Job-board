<?php

namespace Database\Seeders;

use App\Models\SalaryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $salaryType = SalaryType::factory(4)->create();

        $salaries = [
            [
                'id' => 1,
                'title' => 'Base salary',
            ],
            [
                'id' => 2,
                'title' => 'Commission',
            ],
            [
                'id' => 3,
                'title' => 'Sale',
            ],
            [
                'id' => 4,
                'title' => 'Hourly',
            ]
        ];

        foreach ($salaries as $salary) {
            SalaryType::factory()->create($salary);
        }
    }
}
