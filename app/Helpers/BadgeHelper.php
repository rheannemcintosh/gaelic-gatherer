<?php

namespace App\Helpers;

use App\Models\Badge;
use Illuminate\Support\Facades\Auth;

class BadgeHelper
{
    /**
     * Assign all badges to the current user.
     */
    public static function assignBadgesToUser ()
    {
        $user = Auth::user();

        $badges = Badge::all();

        foreach ($badges as $badge) {
            $user->badges()->attach($badge->id, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
