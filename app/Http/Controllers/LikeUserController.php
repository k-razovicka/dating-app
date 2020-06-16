<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeUserController extends Controller
{
    public function __invoke(User $user, Request $request)
    {
        if ($request->get('liked-user-id')) {
            DB::table('user_likes')->insert([
                ['user_id' => auth()->user()->id, 'liked_user_id' => $request->get('liked-user-id'), 'affection' => 'like'
                ]
            ]);

        } elseif ($request->get('disliked-user-id')) {
            DB::table('user_likes')->insert([
                ['user_id' => auth()->user()->id, 'liked_user_id' => $request->get('disliked-user-id'), 'affection' => 'dislike']
            ]);
        }

        if (auth()->user()->interested_in == 'female') {

            $nextUserID = User::query()->withoutMe()->withoutLiked()->withoutDisliked()->onlyFemale()->ageRange()->min('id');

            if ($nextUserID != null) {
                return redirect()->route('users.show-user', ['user' => $nextUserID]);
            } else {
                return redirect('/show-all')->with('status', 'Sorry, nothing more to offer! Please be patient!');
            }


        } elseif (auth()->user()->interested_in == 'male') {

            $nextUserID = User::query()->withoutMe()->withoutLiked()->withoutDisliked()->onlyMale()->ageRange()->min('id');

            if ($nextUserID != null) {
                return redirect()->route('users.show-user', ['user' => $nextUserID]);
            } else {
                return redirect('/show-all')->with('status', 'Sorry, nothing more to offer! Please be patient!');
            }

        } else {

            $nextUserID = User::query()->withoutMe()->withoutLiked()->withoutDisliked()->ageRange()->min('id');

            if ($nextUserID != null) {
                return redirect()->route('users.show-user', ['user' => $nextUserID]);
            } else {
                return redirect('/show-all')->with('status', 'Sorry, nothing more to offer! Please be patient!');
            }
        }

    }

}
