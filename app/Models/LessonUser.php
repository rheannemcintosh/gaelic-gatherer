<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LessonUser extends Pivot
{
    protected $table = 'user_lessons';

    // Define fillable attributes
    protected $fillable = [
        'lesson_id',
        'user_id',
        'completed',
        'completed_at'
    ];
}
