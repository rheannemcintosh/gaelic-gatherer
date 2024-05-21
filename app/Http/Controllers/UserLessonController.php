<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Attach the lesson to the user
        auth()->user()->lessons()->updateExistingPivot($request->lesson, ['completed' => true, 'completed_at' => now()]);

        // Redirect back to the home page
        return redirect(route('badges.check'));
    }
}
