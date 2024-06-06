<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    /** The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'study_group',
        'pre_study_motivation',
        'pre_study_competency',
        'pre_study_completed_at',
        'study_started_at',
        'study_completed_at',
        'post_study_motivation',
        'post_study_born_in_scotland',
        'post_study_live_in_scotland',
        'post_study_visited_scotland',
        'post_study_scottish_ancestry',
        'post_study_relations_to_highlands_and_islands',
        'post_study_interested_in_scottish_culture',
        'post_study_speak_scottish_gaelic',
        'post_study_speak_gaelic',
        'post_study_interested_in_scottish_gaelic',
        'post_study_interested_in_gaelic',
        'post_study_completed_at',
        'quiz_one_unlocked_at',
        'quiz_one_started_at',
        'quiz_one_completed_at',
        'quiz_two_unlocked_at',
        'quiz_two_started_at',
        'quiz_two_completed_at',
        'quiz_three_unlocked_at',
        'quiz_three_started_at',
        'quiz_three_completed_at',
    ];

    // One-to-One relationship with User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
