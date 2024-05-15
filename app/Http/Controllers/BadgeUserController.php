<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeUserController extends Controller
{
    /**
     * Store a relationship between a badge and a user.
     */
    public function store(Request $request)
    {
        // Get the current user
        $user = Auth::user();

        // Add the completed and completed at fields
        $pivotData = [
            'completed' => true,
            'completed_at' => now(),
        ];

        // Attach the badge to the user
        $user->badges()->attach($request->badge, $pivotData);

        // Redirect back to the home page
        return redirect(RouteServiceProvider::HOME);
    }
}
