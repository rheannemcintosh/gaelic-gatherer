<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            'unit_id' => 1,
            'lesson_type_id' => 1,
            'name' => 'Scottish Greetings Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 2,
            'lesson_type_id' => 1,
            'name' => 'Scottish Places Overview',
            'description' => 'Learn how to greet people in Scottish Gaelic.',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 3,
            'lesson_type_id' => 1,
            'name' => 'Scottish Food & Drink Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 1,
            'name' => 'Scottish Weather Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 1,
            'name' => 'Scottish Gaelic Alphabet Overview',
            'required' => true,
        ]);
    }
}
