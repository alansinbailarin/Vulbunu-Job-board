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
        $seniority = Seniority::factory(4)->create();
    }
}
