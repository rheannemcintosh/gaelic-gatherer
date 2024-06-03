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
        if (!auth()->user()->data->pre_study_completed_at) {
            return redirect(route('pre-study-questionnaire.show.consent'));
         }

        if(auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && is_null(auth()->user()->data->study_completed_at)) {
            return redirect(route('overview.show'));
        }

        if(auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && !is_null(auth()->user()->data->study_completed_at)) {
            return redirect(route('post-study-questionnaire.show.consent'));
        }

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
        if (auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && is_null(auth()->user()->data->study_completed_at)) {
            $user = Auth::user();

            $units = Unit::with(['lessons' => function($query) use ($user) {
                $query->with(['users' => function($query) use ($user) {
                    $query->where('user_id', $user->id);
                }]);
            }])->get();

            $unitPercentages = UnitHelper::getCompletionPercentagesOfAllUnits($units);

            return view('pages.overview', compact('units', 'unitPercentages'));
        }

        if (auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && !is_null(auth()->user()->data->study_completed_at)) {
            return redirect(route('post-study-questionnaire.show.consent'));
        }


        return redirect(route('pre-study-questionnaire.show.consent'));
    }

    public function completeTheStudy()
    {
        // Get the authenticated user
        $user = Auth::user();


        // Find the user data field
        $userData = UserData::find($user->id);

        // Update the study completed at field
        $userData->update([
            'study_completed_at' => now()
        ]);

        return redirect(route('post-study-questionnaire.show.consent'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showOnHoldPage()
    {
        if (auth()->user()->data->quiz_one_completed_at) {
            return view('pages.on-hold');
        }

        return redirect(route('knowledge-retention-quiz.show.consent', ['quiz' => 1]));
    }
}
