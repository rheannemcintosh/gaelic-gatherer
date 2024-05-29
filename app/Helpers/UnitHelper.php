<?php

namespace App\Helpers;

use App\Models\Lesson;

class UnitHelper
{
    public static function getCompletitionPercentagesOfUnits($units)
    {
        $percentageComplete = [];

        foreach ($units as $unit) {
            $numLessonsInUnit = Lesson::where('unit_id', $unit->id)->count();

            $completedLessonsInUnit = auth()->user()->completedLessons()->whereHas('unit', function ($query) use ($unit) {
                $query->where('title', $unit->title);
            })->count();

            $percentageComplete[$unit->id] = ($completedLessonsInUnit / $numLessonsInUnit) * 100;
        }

        return $percentageComplete;
    }
}
