<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireResponse;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostStudyQuestionnaireController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
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

        $questionnaireResponde = QuestionnaireResponse::create([
            'user_id' => Auth::id(),
            'post_study_motivation' => $request->post_study_motivation,
            'born_in_scotland' => isset($request->born_in_scotland) ?? false,
            'live_in_scotland' => isset($request->live_in_scotland) ?? false,
            'visited_scotland' => isset($request->visited_scotland) ?? false,
            'scottish_ancestry' => isset($request->scottish_ancestry) ?? false,
            'relations_to_highlands_and_islands' => isset($request->relations_to_highlands_and_islands) ?? false,
            'interested_in_scottish_culture' => isset($request->interested_in_scottish_culture) ?? false,
            'speak_scottish_gaelic' => isset($request->speak_scottish_gaelic) ?? false,
            'speak_gaelic' => isset($request->speak_gaelic) ?? false,
            'interested_in_scottish_gaelic' => isset($request->interested_in_scottish_gaelic) ?? false,
            'interested_in_gaelic' => isset($request->interested_in_gaelic) ?? false,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
