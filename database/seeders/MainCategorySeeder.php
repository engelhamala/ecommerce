<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MainCategory;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MainCategory::create([
            'translation_lang' => 'ar',
            'translation_of' => '0',
            'name' => 'لابتوبات',
            'abbr' => 'ar',
            'photo'=> '1.png',
            'slug' => '',
            'active' => true
        ]);

        MainCategory::create([
            'translation_lang' => 'en',
            'translation_of' => '1',
            'name' => 'laptobs',
            'abbr' => 'ar',
            'photo'=> '1.png',
            'slug' => '',
            'active' => true
        ]);

        MainCategory::create([
            'translation_lang' => 'ar',
            'translation_of' => '0',
            'name' => 'أطفال',
            'abbr' => 'ar',
            'photo'=> '1.png',
            'slug' => '',
            'active' => true
        ]);

        MainCategory::create([
            'translation_lang' => 'en',
            'translation_of' => '2',
            'name' => 'children',
            'abbr' => 'ar',
            'photo'=> '1.png',
            'slug' => '',
            'active' => true
        ]);
    }
}
