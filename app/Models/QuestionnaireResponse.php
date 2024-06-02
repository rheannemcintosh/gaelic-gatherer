<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireResponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_study_motivation',
        'born_in_scotland',
        'live_in_scotland',
        'visited_scotland',
        'scottish_ancestry',
        'relations_to_highlands_and_islands',
        'interested_in_scottish_culture',
        'speak_scottish_gaelic',
        'speak_gaelic',
        'interested_in_scottish_gaelic',
        'interested_in_gaelic',
    ];
}
