<?php

namespace App\Http\Controllers;

use App\Helpers\KnowledgeRetentionHelper;
use App\Models\KnowledgeRetentionQuizResult;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KnowledgeRetentionQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'quiz' => 1,
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

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('pages.knowledge-retention-quiz');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
