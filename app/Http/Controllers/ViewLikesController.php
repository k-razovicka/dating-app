<?php

namespace App\Http\Controllers;

use App\Mail\SendMatchedEmail;
use App\User;
use Illuminate\Support\Facades\Mail;

class ViewLikesController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        //users, which I liked
        $liked = auth()->user()->affections()->where('affection', '=', 'like')->pluck('liked_user_id');
        $likedUserID = auth()->user()->whereIn('id', $liked)->get();

        //users, which I disliked
        $disliked = auth()->user()->affections()->where('affection', '=', 'dislike')->pluck('liked_user_id');
        $dislikedUserID = auth()->user()->whereIn('id', $disliked)->get();

        //my matches
        $usersWhoLikedMe = auth()->user()->affectedBy()->where('affection', '=', 'like')->pluck('user_id');
        $likedEachOther = $liked->merge($usersWhoLikedMe);
        $matchedUsers = $likedEachOther->duplicates();
        $matches = $user->whereIn('id', $matchedUsers)->get();

        //matched user emails
        $matchesEmail = $user->whereIn('id', $matchedUsers)->pluck('email')->all();

        if (count($matchedUsers) != 0)
        {
            Mail::to($user->email)->send(new SendMatchedEmail($user));
            Mail::to($matchesEmail)->send(new SendMatchedEmail($user));
        }

        return view('view-likes', [
            'user' => $user,
            'likedUserID' => $likedUserID,
            'dislikedUserID' => $dislikedUserID,
            'matches' => $matches,
        ]);
    }
}
