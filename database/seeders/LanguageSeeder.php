<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $language = Language::factory(4)->create();

        $languages = [
            [
                'id' => 1,
                'name' => 'English',
                'code' => 'en',
                'description' => 'English language'
            ],
            [
                'id' => 2,
                'name' => 'Spanish',
                'code' => 'es',
                'description' => 'Spanish language'
            ],
            [
                'id' => 3,
                'name' => 'French',
                'code' => 'fr',
                'description' => 'French language'
            ],
            [
                'id' => 4,
                'name' => 'German',
                'code' => 'de',
                'description' => 'German language'
            ],
            [
                'id' => 5,
                'name' => 'Italian',
                'code' => 'it',
                'description' => 'Italian language'
            ],
            [
                'id' => 6,
                'name' => 'Portuguese',
                'code' => 'pt',
                'description' => 'Portuguese language'
            ],
            [
                'id' => 7,
                'name' => 'Russian',
                'code' => 'ru',
                'description' => 'Russian language'
            ],
            [
                'id' => 8,
                'name' => 'Chinese',
                'code' => 'zh',
                'description' => 'Chinese language'
            ],
            [
                'id' => 9,
                'name' => 'Japanese',
                'code' => 'ja',
                'description' => 'Japanese language'
            ],
            [
                'id' => 10,
                'name' => 'Arabic',
                'code' => 'ar',
                'description' => 'Arabic language'
            ],
            [
                'id' => 11,
                'name' => 'Hindi',
                'code' => 'hi',
                'description' => 'Hindi language'
            ],
            [
                'id' => 12,
                'name' => 'Bengali',
                'code' => 'bn',
                'description' => 'Bengali language'
            ],
            [
                'id' => 13,
                'name' => 'Punjabi',
                'code' => 'pa',
                'description' => 'Punjabi language'
            ],
            [
                'id' => 14,
                'name' => 'Turkish',
                'code' => 'tr',
                'description' => 'Turkish language'
            ],
            [
                'id' => 15,
                'name' => 'Korean',
                'code' => 'ko',
                'description' => 'Korean language'
            ],
            [
                'id' => 16,
                'name' => 'Dutch',
                'code' => 'nl',
                'description' => 'Dutch language'
            ],
            [
                'id' => 17,
                'name' => 'Polish',
                'code' => 'pl',
                'description' => 'Polish language'
            ],
            [
                'id' => 18,
                'name' => 'Ukrainian',
                'code' => 'uk',
                'description' => 'Ukrainian language'
            ],
            [
                'id' => 19,
                'name' => 'Romanian',
                'code' => 'ro',
                'description' => 'Romanian language'
            ],
            [
                'id' => 20,
                'name' => 'Greek',
                'code' => 'el',
                'description' => 'Greek language'
            ],
            [
                'id' => 21,
                'name' => 'Hungarian',
                'code' => 'hu',
                'description' => 'Hungarian language'
            ],
            [
                'id' => 22,
                'name' => 'Czech',
                'code' => 'cs',
                'description' => 'Czech language'
            ],
            [
                'id' => 23,
                'name' => 'Swedish',
                'code' => 'sv',
                'description' => 'Swedish language'
            ]
        ];

        foreach ($languages as $language) {
            Language::factory()->create($language);
        }
    }
}
