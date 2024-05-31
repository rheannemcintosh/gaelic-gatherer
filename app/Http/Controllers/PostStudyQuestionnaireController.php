<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\QuestionnaireResponse;
use App\Models\User;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostStudyQuestionnaireController extends Controller
{
    /**
     * Display the consent for the post-study questionnaire.
     */
    public function showConsent()
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

        $userData = UserData::find(Auth::id());

        $userData->update([
            'study_completed_at' => now(),
        ]);


        if (Auth::user()->post_study_consent) {
            return redirect(route('post-study-questionnaire.show'));
        }

        return view('post-study-questionnaire.consent');
    }

    /**
     * Store the consent to the pre-study questionnaire.
     */
    public function storeConsent()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Update the study consent field
        $user->update([
            'post_study_consent' => true
        ]);

        // Redirect to the pre-study questionnaire form
        return redirect(route('post-study-questionnaire.show'));
    }

    /**
     * Display the pre-study questionnaire form.
     */
    public function show()
    {
        if (!Auth::user()->post_study_consent) {
            return redirect(route('post-study-questionnaire.show.consent'));
        }

        if (!is_null(auth()->user()->data->post_study_completed_at)) {
            return redirect(route('knowledge-retention-quiz.show.consent', ['quiz' => 1]));
        }

        return view('post-study-questionnaire.form');
    }

    /**
     * Store the pre-study questionnaire form.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'post_study_motivation' => ['required', 'string'],
        ]);

        $userData = UserData::find(Auth::id());

        $userData->update([
            'user_id' => Auth::id(),
            'post_study_motivation' => $request->post_study_motivation,
            'post_study_born_in_scotland' => isset($request->born_in_scotland) ?? false,
            'post_study_live_in_scotland' => isset($request->live_in_scotland) ?? false,
            'post_study_visited_scotland' => isset($request->visited_scotland) ?? false,
            'post_study_scottish_ancestry' => isset($request->scottish_ancestry) ?? false,
            'post_study_relations_to_highlands_and_islands' => isset($request->relations_to_highlands_and_islands) ?? false,
            'post_study_interested_in_scottish_culture' => isset($request->interested_in_scottish_culture) ?? false,
            'post_study_speak_scottish_gaelic' => isset($request->speak_scottish_gaelic) ?? false,
            'post_study_speak_gaelic' => isset($request->speak_gaelic) ?? false,
            'post_study_interested_in_scottish_gaelic' => isset($request->interested_in_scottish_gaelic) ?? false,
            'post_study_interested_in_gaelic' => isset($request->interested_in_gaelic) ?? false,
            'post_study_completed_at' => now(),
            'quiz_one_unlocked_at' => now(),
        ]);

        return redirect(route('knowledge-retention-quiz.show.consent', ['quiz' => 1]));
    }
}
