<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $country = Country::factory(10)->create();
        $countries = [
            ['id' => '30', 'name' => 'brazil'],
            ['id' => '38', 'name' => 'canada'],
            ['id' => '44', 'name' => 'china'],
            ['id' => '75', 'name' => 'france'],
            ['id' => '82', 'name' => 'germany'],
            ['id' => '101', 'name' => 'india'],
            ['id' => '109', 'name' => 'japan'],
            ['id' => '142', 'name' => 'mexico'],
            ['id' => '181', 'name' => 'russia'],
            ['id' => '230', 'name' => 'united kingdom'],
            ['id' => '231', 'name' => 'united states'],
        ];

        foreach ($countries as $country) {
            Country::factory()->create($country);
        }
    }
}
