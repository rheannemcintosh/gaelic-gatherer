<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lesson_types')->insert([
            'name' => 'Reading',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Map',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Picture',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Translation',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Matching',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Bingo',
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Story',
        ]);
    }
}
