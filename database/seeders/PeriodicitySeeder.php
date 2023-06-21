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
        $periodicity = Periodicity::factory(4)->create();
    }
}
