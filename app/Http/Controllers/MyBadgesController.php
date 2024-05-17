<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Providers\RouteServiceProvider;
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
            }
        }

        // Redirect the user to the home page
        return redirect(RouteServiceProvider::HOME);
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
     * Display the badges for the current user.
     */
    public function index ()
    {
        $myBadges = auth()->user()->badges;

        return view('my-badges.index', compact('myBadges'));
    }
}
