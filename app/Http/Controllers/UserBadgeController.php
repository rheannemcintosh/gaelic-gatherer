<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Lesson;
use App\Models\Unit;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBadgeController extends Controller
{
    /**
     * Check for new badges earned by the current user.
     *
     * @return RedirectResponse
     */
    public function checkForNewBadges(): RedirectResponse
    {
        if (auth()->user()->data->study_group == 'Control') {
            return redirect(RouteServiceProvider::HOME);
        }

        $newBadges = [];
        foreach (auth()->user()->uncompletedBadges() as $badge) {
            $checkPassed = false;
            switch ($badge->name) {
                case 'Shortbread Starter':
                    $checkPassed = $this->checkShortbreadStarter($badge->id);
                    break;
                case 'Brave Bobby':
                    $checkPassed = $this->checkBraveBobby($badge->id);
                    break;
                case 'Knowing Kelpie':
                    $checkPassed = $this->checkKnowingKelpie($badge->id);
                    break;
                case 'Remarkable Rabbie':
                    $checkPassed = $this->checkRemarkableRabbie($badge->id);
                    break;
                case 'Magnificent Munro':
                    $checkPassed = $this->checkMagnificentMunro($badge->id);
                    break;
                case 'Talented Thistle':
                    $checkPassed = $this->checkTalentedThistle($badge->id);
                    break;
                case 'Celtic Connoisseur':
                    $checkPassed = $this->checkCelticConnoisseur($badge->id);
                    break;
                case 'Brilliant Bagpipes':
                    $checkPassed = $this->checkBrilliantBagpipes($badge->id);
                    break;
                case 'Terrific Terrier':
                    $checkPassed = $this->checkTerrificTerrier($badge->id);
                    break;
                case 'Highlander Hello':
                    $checkPassed = $this->checkHighlanderHello($badge->id);
                    break;
                case 'Admirable Alba':
                    $checkPassed = $this->checkAdmirableAlba($badge->id);
                    break;
                case 'Happy Haggis':
                    $checkPassed = $this->checkHappyHaggis($badge->id);
                    break;
                case 'Dreich Detective':
                    $checkPassed = $this->checkDreichDetective($badge->id);
                    break;
                case 'Noble Nessie':
                    $checkPassed = $this->checkNobleNessie($badge->id);
                    break;
                case 'Unit Unicorn':
                    $checkPassed = $this->checkUnitUnicorn($badge->id);
                    break;
                case 'Gaelic Gatherer':
                    $checkPassed = $this->checkGaelicGatherer($badge->id);
                    break;
            }

            if ($checkPassed) {
                $newBadges[] = $badge;
            }
        }

        // Redirect the user to the home page
        return redirect(RouteServiceProvider::HOME)->with('newBadges', $newBadges);
    }

    /**
     * Check if the user has started the study,
     * and can be awarded the Shortbread Starter badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkShortbreadStarter($badgeId)
    {
        if (auth()->user()->data->study_started_at != null && auth()->user()->study_consent == true) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed 1 lesson,
     * and can be awarded the Brave Bobby badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkBraveBobby($badgeId)
    {
        if (auth()->user()->countCompletedLessons() >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed 10 lessons,
     * and can be awarded the Knowing Kelpie badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkKnowingKelpie($badgeId)
    {
        if (auth()->user()->countCompletedLessons() >= 10) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed an overview lesson
     * and can be awarded the Remarkable Rabbie badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkRemarkableRabbie($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Overview');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed a matching lesson,
     * and can be awarded the Magnificent Munro badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkMagnificentMunro($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Matching');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed the icon lesson,
     * and can be awarded the Talented Thistle badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkTalentedThistle($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Icon');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed the maths lesson,
     * and can be awarded the Celtic Connoisseur badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkCelticConnoisseur($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Maths');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has been on the platform for 5 minutes,
     * and can be awarded the Brilliant Bagpipes badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkBrilliantBagpipes($badgeId)
    {
        $startDate = Carbon::parse(auth()->user()->data->study_started_at);
        $minutesStudying = $startDate->diffInMinutes(now());

        if ($minutesStudying >= 5) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has been on the platform for 30 minutes,
     * and can be awarded the Terrific Terrier badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkTerrificTerrier($badgeId)
    {
        $startDate = Carbon::parse(auth()->user()->data->study_started_at);
        $minutesStudying = $startDate->diffInMinutes(now());

        if ($minutesStudying >= 30) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all lessons in the greetings unit,
     * and can be awarded the Highlander Hello badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkHighlanderHello($badgeId)
    {
        $unitId = Unit::where('title', 'Greetings')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedGreetingsLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Greetings');
        })->count();

        if ($completedGreetingsLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all lessons in the places unit,
     * and can be awarded the Admirable Alba badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkAdmirableAlba($badgeId)
    {
        $unitId = Unit::where('title', 'Places')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedPlacesLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Places');
        })->count();

        if ($completedPlacesLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all lessons in the places unit,
     * and can be awarded the Happy Haggis badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkHappyHaggis($badgeId)
    {
        $unitId = Unit::where('title', 'Food & Drink')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedFoodAndDrinkLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Food & Drink');
        })->count();

        if ($completedFoodAndDrinkLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all lessons in the weather unit,
     * and can be awarded the Dreich Detective badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkDreichDetective($badgeId)
    {
        $unitId = Unit::where('title', 'Weather')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedWeatherLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Weather');
        })->count();

        if ($completedWeatherLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all lessons in the numbers unit,
     * and can be awarded the Noble Nessie badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkNobleNessie($badgeId)
    {
        $unitId = Unit::where('title', 'Numbers')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedNumbersLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Numbers');
        })->count();

        if ($completedNumbersLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has completed all units,
     * and can be awarded the Unit Unicorn badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkUnitUnicorn($badgeId)
    {
        $unitsIds = Unit::all()->pluck('id');
        $numberOfUnits = $unitsIds->count();

        $unitsCompleted = 0;

        foreach ($unitsIds as $unitId) {
            $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

            $completedLessonsInUnit = auth()->user()->completedLessons()->whereHas('unit', function ($query) use ($unitId) {
                $query->where('unit_id', $unitId);
            })->count();

            if ($completedLessonsInUnit >= $numLessonsInUnit) {
                $unitsCompleted++;
            }
        }

        if ($unitsCompleted >= $numberOfUnits) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Check if the user has been on the platform for 5 minutes.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkGaelicGatherer($badgeId)
    {
        $numberOfBadges = auth()->user()->badges()->wherePivot('completed', true)->count();

        if ($numberOfBadges >= 19) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
            return true;
        }
        return false;
    }

    /**
     * Display the badges for the current user.
     */
    public function index ()
    {
        $myBadges = auth()->user()->badges;

        return view('my-badges.index', compact('myBadges'));
    }
}
