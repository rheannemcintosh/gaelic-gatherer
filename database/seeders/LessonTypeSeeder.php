<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds for the lesson types table, to add the 4 available lesson types.
     */
    public function run(): void
    {
        DB::table('lesson_types')->insert([
            'name' => 'Overview',
            'thumbnail' => 'menu_book',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Matching',
            'thumbnail' => 'extension',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Icon',
            'thumbnail' => 'photo_camera',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Maths',
            'thumbnail' => 'calculate',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
