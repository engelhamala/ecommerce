<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'name' => 'English',
            'abbr' => 'en',
            'direction'=> 'من اليسار الى اليمين',
            'active' => true
        ]);

        Language::create([
            'name' => 'Arabic',
            'abbr' => 'ar',
            'direction'=> 'من اليمين الى اليسار ',
            'active' => true
        ]);
    }
}
