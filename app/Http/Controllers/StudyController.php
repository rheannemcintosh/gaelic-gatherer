<?php

namespace App\Http\Controllers;

use App\Helpers\UnitHelper;
use App\Models\Badge;
use App\Models\Lesson;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    // Show the welcome page to research participants
    public function showWelcomePage()
    {
        if (!auth()->user()->data->pre_study_completed_at) {

            return redirect()
                ->route('pre-study-questionnaire.show.consent')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
         }

        if(auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && is_null(auth()->user()->data->study_completed_at)) {

            return redirect()
                ->route('overview.show')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
        }

        if(auth()->user()->study_consent && !is_null(auth()->user()->data->study_started_at) && !is_null(auth()->user()->data->study_completed_at)) {
            return redirect()
                ->route('post-study-questionnaire.show.consent')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
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
            return redirect()
                ->route('post-study-questionnaire.show.consent')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
        }

        return redirect()
            ->route('pre-study-questionnaire.show.consent')
            ->with([
                'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
            ]);
    }

    public function completeTheStudy()
    {
        $numberOfOverviewLessons = Lesson::whereHas('lessonType', function($query) {
            $query->where('name', '=', 'Overview');
        })->count();

        $completedLessons = User::find(Auth::id())
            ->lessons()
            ->wherePivot('completed', true)
            ->whereHas('lessonType', function($query) {
                $query->where('name', '=', 'Overview');
            })
            ->count();

        if ($numberOfOverviewLessons > $completedLessons) {
            return redirect(RouteServiceProvider::HOME);
        }

        // Get the authenticated user
        $user = Auth::user();

        // Find the user data field
        $userData = UserData::find($user->id);

        // Update the study completed at field
        $userData->update([
            'study_completed_at' => now()
        ]);

        return redirect()
            ->route('post-study-questionnaire.show.consent')
            ->with([
                'statusMessage' => 'Thank you for exploring the platform. Please consent to the post-study questionnaire.',
                'statusType'    => 'success',
            ]);
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

    public function showHelpPage()
    {
        $units = Unit::all();
        $badges = Badge::all();

        return view('pages.help', compact('units', 'badges'));
    }

    public function showThankYouPage()
    {
        if (!auth()->user()->data->quiz_three_completed_at) {
            return redirect(route('post-study-questionnaire.show.consent'));
        }

        return view('pages.thank-you');
    }
}
