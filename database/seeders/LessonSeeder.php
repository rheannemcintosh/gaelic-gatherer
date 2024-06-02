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
            'name' => 'Greetings Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 2,
            'lesson_type_id' => 1,
            'name' => 'Places Overview',
            'description' => 'Learn how to greet people in Scottish Gaelic.',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 3,
            'lesson_type_id' => 1,
            'name' => 'Food & Drink Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 1,
            'name' => 'Weather Overview',
            'required' => true,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 1,
            'name' => 'Numbers Overview',
            'required' => true,
        ]);
        DB::table('lessons')->insert([
            'unit_id' => 1,
            'lesson_type_id' => 5,
            'name' => 'Match Greetings',
            'required' => false,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 2,
            'lesson_type_id' => 5,
            'name' => 'Match Places',
            'required' => false,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 3,
            'lesson_type_id' => 5,
            'name' => 'Match Food & Drink',
            'required' => false,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 5,
            'name' => 'Match Weather',
            'required' => false,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 5,
            'name' => 'Match Numbers',
            'required' => false,
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 8,
            'name' => 'Maths',
            'required' => false,
        ]);
    }
}
