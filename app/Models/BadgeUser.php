<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BadgeUser extends Pivot
{
    protected $table = 'badge_user';

    use HasFactory;

    // Define fillable attributes
    protected $fillable = [
        'badge_id',
        'user_id',
        'completed',
        'completed_at',
    ];
}
