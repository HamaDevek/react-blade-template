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
            Language::create([
                'name' => 'English',
                'code' => 'en',
                'is_active' => true,
                'rtl' => false,
            ]);
            Language::create([
                'name' => 'Arabic',
                'code' => 'ar',
                'is_active' => true,
                'rtl' => true,
            ]);
            Language::create([
                'name' => 'Kurdish (Soranî)',
                'code' => 'ku-so',
                'is_active' => true,
                'rtl' => true,
            ]);
            Language::create([
                'name' => 'Kurdish (Kurmanji)',
                'code' => 'ku-ku',
                'is_active' => false,
                'rtl' => false,
            ]);
            Language::create([
                'name' => 'Persian',
                'code' => 'fa',
                'is_active' => false,
                'rtl' => true,
            ]);
    }
}
