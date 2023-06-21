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
        $jobModality = JobModality::factory(4)->create();
    }
}
