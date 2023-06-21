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
        $workday = Workday::factory(4)->create();
    }
}
