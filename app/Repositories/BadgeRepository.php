<?php

namespace App\Repositories;

use App\Models\Badge;

class BadgeRepository
{
    /**
     * Get all available badges.
     */
    public function all()
    {
        return auth()->user()->badges;
    }
}
