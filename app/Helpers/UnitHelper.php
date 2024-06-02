<?php

namespace App\Helpers;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Collection;

class UnitHelper
{
    /**
     * Get the user completion percentages of all unit.
     *
     * @param Collection $units
     * @return array $unitPercentages
     */
    public static function getCompletionPercentagesOfAllUnits(Collection $units): array
    {
        $unitPercentages = [];

        foreach ($units as $unit) {

            // Get the number of lessons in the unit
            $numLessonsInUnit = Lesson::where('unit_id', $unit->id)->count();

            // Get the number of lessons a user has completed in the unit
            $completedLessonsInUnit = auth()->user()->completedLessons()->whereHas('unit', function ($query) use ($unit) {
                $query->where('title', $unit->title);
            })->count();

            // Calculate and store the percentage of lessons completed in the unit
            $unitPercentages[$unit->id] = ($completedLessonsInUnit / $numLessonsInUnit) * 100;
        }

        return $unitPercentages;
    }
}
