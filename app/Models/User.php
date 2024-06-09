<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'initial_consent',
        'pre_study_consent',
        'study_consent',
        'post_study_consent',
        'quiz_one_consent',
        'quiz_two_consent',
        'quiz_three_consent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The data for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    /**
     * The lessons which have been completed by the user.
     *
     * @return BelongsToMany
     */
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->withPivot('completed', 'completed_at', 'number_of_starts', 'number_of_completes');
    }

    /**
     * The badges which have been completed by the user.
     *
     * @return BelongsToMany
     */
    public function badges(): BelongsToMany
    {
        return $this->belongsToMany(Badge::class)->withPivot('completed', 'completed_at');
    }

    /**
     * The lessons which have been completed by the user.
     *
     * @return BelongsToMany
     */
    public function completedLessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class)->using(LessonUser::class)->wherePivot('completed', true);
    }

    /**
     * Count the number of completed lessons for the user.
     *
     * @return int
     */
    public function countCompletedLessons()
    {
        return $this->completedLessons()->count();
    }

    /**
     * The uncompleted badges for the user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function uncompletedBadges(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->badges()->wherePivot('completed', false)->get();
    }
}
