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
            'description' => 'Overview lessons provide an overview of all the content required for the knowledge retention quizzes. Each overview lesson will give a list of 10 words or phrases, and their Scottish Gaelic translations.',
            'required' => true,
            'thumbnail' => 'menu_book',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Matching',
            'description' => 'Matching Lessons require you to match the Scottish Gaelic word or phrase with the English translation. Each matching lesson will have 4 pairs of words or phrases to match. If you get a pair wrong, they will turn red and then reset. Correct matches will turn green. You can only complete the lesson when you have successfully matched all pairs.',
            'required' => true,
            'thumbnail' => 'extension',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Icon',
            'description' => 'This is a lesson specific to the weather unit. This lesson requires you to match the four weather icons with the Scottish Gaelic word or phrase. If you get a pair wrong, they will turn red and then reset. Correct matches will turn green. You can only complete the lesson when you have successfully matched all pairs.',
            'required' => true,
            'thumbnail' => 'photo_camera',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lesson_types')->insert([
            'name' => 'Maths',
            'description' => 'This is a lesson specific to the numbers unit. You will be provided 4 equations to solve. These will consist of a variety of english numbers and scottish gaelic numbers. You must then select the correct answer in Scottish Gaelic. If you get an answer wrong, it will turn red and then reset. Correct answers will turn green. You can only complete the lesson when you have successfully answered all questions.',
            'required' => true,
            'thumbnail' => 'calculate',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
