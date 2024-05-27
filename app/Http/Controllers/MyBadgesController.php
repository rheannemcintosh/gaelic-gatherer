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

class MyBadgesController extends Controller
{
    /**
     * Assign all badges to the current user.
     */
    public function assignBadgesToUser ()
    {
        $user = Auth::user();

        $badges = Badge::all();

        foreach ($badges as $badge) {
            $user->badges()->attach($badge->id, ['created_at' => now(), 'updated_at' => now()]);
        }

        return redirect()->route('welcome.show');
    }

    /**
     * Check for new badges earned by the current user.
     *
     * @return RedirectResponse
     */
    public function checkForNewBadges(): RedirectResponse
    {
        foreach (auth()->user()->uncompletedBadges() as $badge) {
            switch ($badge->name) {
                case 'Shortbread Starter':
                    $this->checkShortbreadStarter($badge->id);
                    break;
                case 'Brilliant Bagpipes':
                    $this->checkBrilliantBagpipes($badge->id);
                    break;
                case 'Kingly Kilt':
                    $this->checkKinglyKilt($badge->id);
                    break;
                case 'Terrific Terrier':
                    $this->checkTerrificTerrier($badge->id);
                    break;
                case 'Rabbie Reader':
                    $this->checkRabbieReader($badge->id);
                    break;
                case 'Wonder Wallace':
                    $this->checkWonderWallace($badge->id);
                    break;
                case 'Brave Bobby':
                    $this->checkBraveBobby($badge->id);
                    break;
                case 'Talented Thistle':
                    $this->checkTalentedThistle($badge->id);
                    break;
                case 'Gaelic Gatherer':
                    $this->checkGaelicGatherer($badge->id);
                    break;
                case 'Highlander Hello':
                    $this->checkHighlanderHello($badge->id);
                    break;
                case 'Admirable Alba':
                    $this->checkAdmirableAlba($badge->id);
                    break;
                case 'Tablet Taster':
                    $this->checkTabletTaster($badge->id);
                    break;
                case 'Dreich Detective':
                    $this->checkDreichDetective($badge->id);
                    break;
            }
        }

        // Redirect the user to the home page
        return redirect(RouteServiceProvider::HOME);
    }

    private function checkShortbreadStarter($badgeId)
    {
        if (auth()->user()->data->study_started_at != null && auth()->user()->study_consent == true) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed the required lessons for the Brilliant Bagpipes badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkBrilliantBagpipes($badgeId)
    {
        if (auth()->user()->countCompletedLessons() >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed the required lessons for the Kingly Kilt badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkKinglyKilt($badgeId)
    {
        if (auth()->user()->countCompletedLessons() >= 5) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed the required lessons for the Terrific Terrier badge.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkTerrificTerrier($badgeId)
    {
        if (auth()->user()->countCompletedLessons() >= 10) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed an overview lesson.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkRabbieReader($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Overview');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed an overview lesson.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkWonderWallace($badgeId)
    {
        $completedOverviewLessons = auth()->user()->completedLessons()->whereHas('lessonType', function ($query) {
            $query->where('name', 'Matching');
        })->count();

        if ($completedOverviewLessons >= 1) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has been on the platform for 5 minutes.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkBraveBobby($badgeId)
    {
        $startDate = Carbon::parse(auth()->user()->data->study_started_at);
        $minutesStudying = $startDate->diffInMinutes(now());

        if ($minutesStudying >= 5) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has been on the platform for 5 minutes.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkTalentedThistle($badgeId)
    {
        $startDate = Carbon::parse(auth()->user()->data->study_started_at);
        $minutesStudying = $startDate->diffInMinutes(now());

        if ($minutesStudying >= 30) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has been on the platform for 5 minutes.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkGaelicGatherer($badgeId)
    {
        $numberOfBadges = auth()->user()->badges()->wherePivot('completed', true)->count();

        if ($numberOfBadges >= 20) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed all lessons in the greetings unit.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkHighlanderHello($badgeId)
    {
        $unitId = Unit::where('title', 'Scottish Greetings')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedGreetingsLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Scottish Greetings');
        })->count();

        if ($completedGreetingsLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed all lessons in the places unit.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkAdmirableAlba($badgeId)
    {
        $unitId = Unit::where('title', 'Scottish Places')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedPlacesLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Scottish Places');
        })->count();

        if ($completedPlacesLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed all lessons in the places unit.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkTabletTaster($badgeId)
    {
        $unitId = Unit::where('title', 'Scottish Food & Drink')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedFoodAndDrinkLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Scottish Food & Drink');
        })->count();

        if ($completedFoodAndDrinkLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
    }

    /**
     * Check if the user has completed all lessons in the weather unit.
     *
     * @param $badgeId integer the id of the badge to check and update if necessary
     */
    private function checkDreichDetective($badgeId)
    {
        $unitId = Unit::where('title', 'Scottish Weather')->pluck('id');
        $numLessonsInUnit = Lesson::where('unit_id', $unitId)->count();

        $completedWeatherLessons = auth()->user()->completedLessons()->whereHas('unit', function ($query) {
            $query->where('title', 'Scottish Weather');
        })->count();

        if ($completedWeatherLessons >= $numLessonsInUnit) {
            auth()->user()->badges()->updateExistingPivot($badgeId, ['completed' => true, 'completed_at' => now()]);
        }
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
