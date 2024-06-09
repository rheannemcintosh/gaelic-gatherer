<?php

namespace App\Http\Controllers;

use App\Helpers\BadgeHelper;
use App\Helpers\LessonHelper;
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
            return redirect()
                ->route('pre-study-questionnaire.show')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
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
        return redirect()
            ->route('pre-study-questionnaire.show')
            ->with([
                'statusMessage' => 'Thank you consenting. Please complete the pre-study questionnaire.',
                'statusType'    => 'success',
            ]);
    }

    /**
     * Display the pre-study questionnaire form.
     */
    public function show()
    {
        if (!is_null(UserData::find(Auth::id()))) {
            return redirect()
                ->route('welcome.show')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
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
        $userData = UserData::find(Auth::id());

        $userData->update([
            'study_group' => \App\Helpers\StudyGroupHelper::assignStudyGroup(),
            'pre_study_motivation' => $request->pre_study_motivation,
            'pre_study_competency' => $request->scottish_gaelic_competency,
            'pre_study_completed_at' => now(),
        ]);

        // Assign Lessons to the User
        LessonHelper::assignLessonsToUser();

        // Assign Badges to the User if they are in the Experimental Group
        if ($userData->study_group == 'Experimental') {
            BadgeHelper::assignBadgesToUser();
        }

        // Redirect to the welcome page
        return redirect()
            ->route('welcome.show')
            ->with([
                'statusMessage' => 'Thank you for completing the pre-study questionnaire. You can now start the study.',
                'statusType'    => 'success',
            ]);
    }
}
