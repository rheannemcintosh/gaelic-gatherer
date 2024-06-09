<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds for the lessons table, to add the 12 available lessons.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            'unit_id' => 1,
            'lesson_type_id' => 1,
            'name' => 'Greetings Overview',
            'description' => 'Learn the basics of how to greet people in Scottish Gaelic.',
            'required' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 2,
            'lesson_type_id' => 1,
            'name' => 'Places Overview',
            'description' => 'Learn the basics of how to say where you\'re from.',
            'required' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 3,
            'lesson_type_id' => 1,
            'name' => 'Food & Drink Overview',
            'description' => 'Learn the basics of how to order food and drink.',
            'required' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 1,
            'name' => 'Weather Overview',
            'description' => 'Learn the basics of how to talk about the weather.',
            'required' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 1,
            'name' => 'Numbers Overview',
            'description' => 'Learn the basics of how to count from one to ten.',
            'required' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('lessons')->insert([
            'unit_id' => 1,
            'lesson_type_id' => 2,
            'name' => 'Matching Greetings',
            'description' => 'Match Scottish Gaelic greetings with their English translation.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 2,
            'lesson_type_id' => 2,
            'name' => 'Matching Places',
            'description' => 'Match Scottish Gaelic places with their English translation.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 3,
            'lesson_type_id' => 2,
            'name' => 'Matching Food & Drink',
            'description' => 'Match Scottish Gaelic food and drink with their English translation.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 2,
            'name' => 'Matching Weather',
            'description' => 'Match Scottish Gaelic weather phrases with their English translation.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 2,
            'name' => 'Matching Numbers',
            'description' => 'Match Scottish Gaelic numbers with their English translation.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 4,
            'lesson_type_id' => 3,
            'name' => 'Weather Icons',
            'description' => 'Tell the weather through common weather icons.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lessons')->insert([
            'unit_id' => 5,
            'lesson_type_id' => 4,
            'name' => 'Calculations',
            'description' => 'Complete the calculations to test your knowledge of numbers.',
            'required' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
