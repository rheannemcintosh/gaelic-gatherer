<?php

namespace App\Helpers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonHelper
{
    /**
     * The different types of lessons available.
     */
    public const LESSON_TYPES = [
        [
            'type' => 'Overview Lessons',
            'description' => 'Overview lessons provide an overview of all the content required for the knowledge retention quizzes. Each overview lesson will give a list of 10 words or phrases, and their Scottish Gaelic translations.',
            'required' => true,
        ],
        [
            'type' => 'Matching Lessons',
            'description' => 'Matching Lessons require you to match the Scottish Gaelic word or phrase with the English translation. Each matching lesson will have 4 pairs of words or phrases to match. If you get a pair wrong, they will turn red and then reset. Correct matches will turn green. You can only complete the lesson when you have successfully matched all pairs.',
            'required' => false,
        ],
        [
            'type' => 'Calculations Lessons',
            'description' => 'This is a lesson specific to the numbers unit. You will be provided 4 equations to solve. These will consist of a variety of english numbers and scottish gaelic numbers. You must then select the correct answer in Scottish Gaelic. If you get an answer wrong, it will turn red and then reset. Correct answers will turn green. You can only complete the lesson when you have successfully answered all questions.',
            'required' => false,
        ]
    ];

    /**
     * Assign all lessons to the current user.
     */
    public static function assignLessonsToUser ()
    {
        $user = Auth::user();

        $lessons = Lesson::all();

        foreach ($lessons as $lesson) {
            $user->lessons()->attach($lesson->id, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
