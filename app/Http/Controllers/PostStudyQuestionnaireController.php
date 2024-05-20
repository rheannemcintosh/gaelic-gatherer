<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\QuestionnaireResponse;
use App\Models\User;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostStudyQuestionnaireController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $numberOfOverviewLessons = Lesson::whereHas('lessonType', function($query) {
            $query->where('name', '=', 'Overview');
        })->count();

        $completedLessons = User::find(Auth::id())
            ->lessons()
            ->wherePivot('completed', true)
            ->pluck('lesson_id')
            ->unique()
            ->count();

        if ($numberOfOverviewLessons != $completedLessons) {
            return redirect(RouteServiceProvider::HOME);
        }

        return view('pages.post-study-questionnaire');
    }

    /**
     * Store a newly created resource in storage.
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
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
