<?php

namespace App\Helpers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonHelper
{
    /**
     * Assign all lessons to the current user.
     */
    public static function assignLessonsToUsers()
    {
        $user = Auth::user();

        $lessons = Lesson::all();

        foreach ($lessons as $lesson) {
            $user->lessons()->attach($lesson->id, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
