<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $currency = Currency::factory(4)->create();

        $currencies = [
            [
                'id' => 1,
                'code' => 'USD',
                'name' => 'US Dollar',
                'symbol' => '$',
            ],
            [
                'id' => 2,
                'code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
            ],
            [
                'id' => 3,
                'code' => 'MXN',
                'name' => 'Mexican Peso',
                'symbol' => '$',
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::factory()->create($currency);
        }
    }
}
