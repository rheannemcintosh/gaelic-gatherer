<?php

namespace App\Helpers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class StudyGroupHelper
{
    /**
     * Assign a study group to the current user.
     */
    public static function assignStudyGroup ()
    {
        $randomNumber = rand(0,1);

        return $randomNumber == 0 ? 'Experimental' : 'Control';
    }
}
