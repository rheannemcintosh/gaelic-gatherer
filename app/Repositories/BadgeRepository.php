<?php

namespace App\Repositories;

use App\Models\Badge;

class BadgeRepository
{
    /**
     * Get all available badges belonginning to the user.
     */
    public function all()
    {
        if (isset(auth()->user()->badges)) {
            return auth()->user()->badges;
        }
    }
}
