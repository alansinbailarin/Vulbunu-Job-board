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
        $salaryType = SalaryType::factory(4)->create();
    }
}
