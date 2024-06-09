<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LessonUser extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lesson_id',
        'user_id',
        'completed',
        'completed_at',
        'number_of_starts',
        'number_of_completes',
    ];
}
