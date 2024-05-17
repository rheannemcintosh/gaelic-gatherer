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
        // Get the current user
        $user   = Auth::user();

        // Add the completed and completed at fields
        $pivotData = [
            'completed' => true,
            'completed_at' => now(),
        ];

        // Attach the lesson to the user
        $user->lessons()->attach($request->lesson, $pivotData);

        // Redirect back to the home page
        return redirect(route('badges.assign'));
    }
}
