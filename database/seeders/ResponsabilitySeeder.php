<?php

namespace Database\Seeders;

use App\Models\Responsability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsability = Responsability::factory(120)->create();
    }
}
