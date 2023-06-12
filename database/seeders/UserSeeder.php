<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Language;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();

        foreach ($users as $user) {
            $languageId = rand(1, 4);
            $user->language()->attach($languageId);
        }

        foreach ($users as $user) {
            $user->skill()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}
