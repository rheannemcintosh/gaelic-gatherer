<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreStudyQuestionnaireController extends Controller
{
    /**
     * Display the consent for the pre-study questionnaire.
     */
    public function showConsent()
    {
        if (Auth::user()->pre_study_consent) {
            return redirect(route('pre-study-questionnaire.show'));
        }

        return view('pre-study-questionnaire.consent');
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
            'pre_study_consent' => true
        ]);

        // Redirect to the pre-study questionnaire form
        return redirect(route('pre-study-questionnaire.show'));
    }

    /**
     * Display the pre-study questionnaire form.
     */
    public function show()
    {
        if (!is_null(UserData::find(Auth::id()))) {
            return redirect(route('welcome.show'));
        }

        return view('pre-study-questionnaire.form');
    }

    /**
     * Store the pre-study questionnaire form.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'pre_study_motivation' => ['required', 'in:Highly Motivated,Moderately Motivated,Slightly Motivated,Not Motivated'],
            'scottish_gaelic_competency' => ['required', 'in:None,Beginner,Intermediate,Advanced,Fluent,Native Speaker']
        ]);

        // Create the user data record
        UserData::create([
            'user_id' => $user->id,
            'study_group' => \App\Helpers\StudyGroupHelper::assignStudyGroup(),
            'pre_study_motivation' => $request->pre_study_motivation,
            'pre_study_competency' => $request->scottish_gaelic_competency,
            'pre_study_completed_at' => now(),
        ]);

        // Redirect to the welcome page
        return redirect(route('welcome.show'));
    }
}
