<?php

namespace App\Http\Controllers;

use App\Helpers\KnowledgeRetentionHelper;
use App\Models\KnowledgeRetentionQuizResult;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KnowledgeRetentionQuizController extends Controller
{
    /**
     * Display the consent for the post-study questionnaire.
     */
    public function showConsent($quiz)
    {
        if ($quiz != 1 && $quiz != 2 && $quiz != 3) {
            abort(404);
        }

        if (
            ($quiz == 1 && Auth::user()->quiz_one_consent) ||
            ($quiz == 2 && Auth::user()->quiz_two_consent) ||
            ($quiz == 3 && Auth::user()->quiz_three_consent)
        ) {
            return redirect()
                ->route('knowledge-retention-quiz.show', ['quiz' => $quiz])
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
        }

        return view('knowledge-retention-quiz.consent', ['quiz' => $quiz]);
    }

    /**
     * Store the consent to the pre-study questionnaire.
     */
    public function storeConsent($quiz)
    {

        // Get the authenticated user
        $user = Auth::user();
        $userData = UserData::find(Auth::id());

        if ($quiz == 1) {
            // Update the study consent field
            $user->update([
                'quiz_one_consent' => true
            ]);

            $userData->update([
                'quiz_one_started_at' => now(),
            ]);
        } else if ($quiz == 2) {
            // Update the study consent field
            $user->update([
                'quiz_two_consent' => true
            ]);

            $userData->update([
                'quiz_two_started_at' => now(),
            ]);
        } else if ($quiz == 3) {
            // Update the study consent field
            $user->update([
                'quiz_three_consent' => true
            ]);

            $userData->update([
                'quiz_three_started_at' => now(),
            ]);
        }

        // Redirect to the pre-study questionnaire form
        return redirect(route('knowledge-retention-quiz.show', ['quiz' => $quiz]));
    }

    /**
     * Display the pre-study questionnaire form.
     */
    public function show($quiz)
    {
        if ($quiz != 1 && $quiz != 2 && $quiz != 3) {
            abort(404);
        }

        if (
            ($quiz == 1 && !Auth::user()->quiz_one_consent) ||
            ($quiz == 2 && !Auth::user()->quiz_two_consent) ||
            ($quiz == 3 && !Auth::user()->quiz_three_consent)
        ) {
            return redirect()
                ->route('knowledge-retention-quiz.show.consent', ['quiz' => $quiz])
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
        }

        if (
            ($quiz == 1 && !is_null(auth()->user()->data->quiz_one_completed_at)) ||
            ($quiz == 2 && !is_null(auth()->user()->data->quiz_two_completed_at)) ||
            ($quiz == 3 && !is_null(auth()->user()->data->quiz_three_completed_at))
        ) {
            return redirect()
                ->route('on-hold.show')
                ->with([
                    'statusMessage' => 'Oops! You tried to access the wrong page. We\'ve redirected you to the correct page!',
                ]);
        }

        return view('knowledge-retention-quiz.form', ['quiz' => $quiz]);
    }

    /**
     * Store the pre-study questionnaire form.
     *
     * @param Request $request
     */
    public function store(Request $request, $quiz)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'knowledge_retention_quiz.*' => 'required', // Assuming all quiz answers are required
        ]);

        $score = 0;

        for ($i = 1; $i <= 10; $i++) {
            $question = $validatedData['knowledge_retention_quiz'][$i];
            $correctAnswer = KnowledgeRetentionHelper::QUESTIONS[$i]['correct_answer'];
            $isCorrect = $question === $correctAnswer;

            if ($isCorrect) {
                $score++;
            }
        }

        KnowledgeRetentionQuizResult::create([
            'user_id' => Auth::id(),
            'quiz' => $quiz,
            'question_1' => $validatedData['knowledge_retention_quiz'][1],
            'question_2' => $validatedData['knowledge_retention_quiz'][2],
            'question_3' => $validatedData['knowledge_retention_quiz'][3],
            'question_4' => $validatedData['knowledge_retention_quiz'][4],
            'question_5' => $validatedData['knowledge_retention_quiz'][5],
            'question_6' => $validatedData['knowledge_retention_quiz'][6],
            'question_7' => $validatedData['knowledge_retention_quiz'][7],
            'question_8' => $validatedData['knowledge_retention_quiz'][8],
            'question_9' => $validatedData['knowledge_retention_quiz'][9],
            'question_10' => $validatedData['knowledge_retention_quiz'][10],
            'score' => $score
        ]);

        $userData = UserData::find(Auth::id());

        if ($quiz == 1) {
            $userData->update([
                'quiz_one_completed_at' => now(),
                'quiz_two_unlocked_at' => Carbon::now()->addHour(),
                'quiz_three_unlocked_at' => Carbon::now()->addDays(14),
            ]);
        } else if ($quiz == 2) {
            $userData->update([
                'quiz_two_completed_at' => now(),
            ]);
        } else if ($quiz == 3) {
            $userData->update([
                'quiz_three_completed_at' => now(),
            ]);
        }

        if ($quiz == 3) {
            return redirect()
                ->route('thank-you.show')
                ->with([
                    'statusMessage' => 'Thank you for completing the entire study!',
                    'statusType'    => 'success',
                ]);
        }

        return redirect()
            ->route('on-hold.show')
            ->with([
                'statusMessage' => 'Thank you for completing the quiz. The next quiz will be available soon!',
                'statusType'    => 'success',
            ]);
    }
}
