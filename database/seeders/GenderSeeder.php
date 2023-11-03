<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $gender = Gender::factory(4)->create();

        $genders = [
            [
                'id' => 1,
                'name' => 'Male',
                'description' => 'Male gender'
            ],
            [
                'id' => 2,
                'name' => 'Female',
                'description' => 'Female gender'
            ],
            [
                'id' => 3,
                'name' => 'Other',
                'description' => 'Other gender'
            ]
        ];

        foreach ($genders as $gender) {
            Gender::factory()->create($gender);
        }
    }
}
