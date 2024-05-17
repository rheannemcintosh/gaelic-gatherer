<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBadgesController extends Controller
{
    /**
     * Assign all badges to the current user.
     */
    public function assignBadgesToUser ()
    {
        $user = Auth::user();

        $badges = Badge::all();

        foreach ($badges as $badge) {
            $user->badges()->attach($badge->id, ['created_at' => now(), 'updated_at' => now()]);
        }
    }

    /**
     * Display the badges for the current user.
     */
    public function index ()
    {
        $myBadges = auth()->user()->badges;

        return view('my-badges.index', compact('myBadges'));
    }
}
