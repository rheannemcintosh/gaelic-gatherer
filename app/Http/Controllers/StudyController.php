<?php

namespace App\Http\Controllers;

use App\Helpers\UnitHelper;
use App\Models\Unit;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    // Show the welcome page to research participants
    public function showWelcomePage()
    {
        return view('pages.welcome');
    }

    // Start the study
    public function startTheStudy()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the study consent field
        $user->update([
            'study_consent' => true
        ]);

        // Find the user data field
        $userData = UserData::find($user->id);

        // Update the study started at field
        $userData->update([
            'study_started_at' => now()
        ]);

        return redirect(route('badges.check'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showOverviewPage()
    {
        $units           = Unit::with('lessons')->get();
        $unitPercentages = UnitHelper::getCompletionPercentagesOfAllUnits($units);

        return view('pages.overview', compact('units', 'unitPercentages'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showOnHoldPage()
    {
        return view('pages.on-hold');
    }
}
