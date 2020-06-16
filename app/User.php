<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'last_name', 'location', 'email', 'password', 'profile_picture', 'sex', 'birthday', 'interested_in', 'description', 'interested_min_age_range', 'interested_max_age_range', 'age'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPicture(): string
    {
        if ($this->profile_picture == null) {
            return env('APP_URL') . '/pictures/default.png';
        }
        return Storage::url($this->profile_picture);
    }

    public function getURL(): string
    {
        $picture = Storage::exists($this->profile_picture);

        if ($picture === false) {

            $picture = $this->profile_picture;
        }
        return $picture;
    }

    public function getAge(): int
    {
        return Carbon::parse($this->attributes['birthday'])->age;
    }

    public function scopeWithoutMe($query)
    {
        $query->where('id', '<>', auth()->id());
    }

    public function scopeOnlyFemale($query)
    {
        $query->where('sex', '=', 'female');
    }

    public function scopeOnlyMale($query)
    {
        $query->where('sex', '=', 'male');
    }

    public function scopeAgeRange($query)
    {
        /**  @var User $user */
        $user = auth()->user();

        if ($user->interested_min_age_range !== null && $user->interested_max_age_range !== null) {
            $minAge = $user->interested_min_age_range;
            $maxAge = $user->interested_max_age_range;

            $minDate = Carbon::today()->subYears($maxAge);
            $maxDate = Carbon::today()->subYears($minAge)->endOfDay();

            $query->whereBetween('birthday', [$minDate, $maxDate]);
        }
    }

    public function scopeWithoutLiked($query)
    {
        /**  @var User $user */
        $user = auth()->user();

        $likedUserIDs = DB::table('user_likes')
            ->leftJoin('users', 'user_likes.user_id', '=', 'users.id')
            ->select('user_likes.liked_user_id')
            ->where('users.id', '=', $user->id)
            ->where('user_likes.affection', '=', 'like')
            ->orderBy('users.created_at', 'desc')
            ->pluck('user_likes.liked_user_id');

        $query->whereNotIn('id', $likedUserIDs);
    }

    public function scopeWithoutDisliked($query)
    {
        /**  @var User $user */
        $user = auth()->user();

        $dislikedUserIDs = DB::table('user_likes')
            ->leftJoin('users', 'user_likes.user_id', '=', 'users.id')
            ->select('user_likes.liked_user_id')
            ->where('users.id', '=', $user->id)
            ->where('user_likes.affection', '=', 'dislike')
            ->orderBy('users.created_at', 'desc')
            ->pluck('user_likes.liked_user_id');

        $query->whereNotIn('id', $dislikedUserIDs);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function affections()
    {
        return $this->hasMany(Affection::class);
    }

    public function affectedBy()
    {
        return $this->hasMany(Affection::class, 'liked_user_id');
    }
}
