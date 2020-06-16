<?php

namespace App\Http\Controllers;

use App\User;

class ShowAllUsersController extends Controller
{
    public function __invoke()
    {
        /**  @var User $user */
        $user = auth()->user();

        if ($user->interested_in == 'male') {

            $users = User::inRandomOrder()
                ->withoutMe()
                ->withoutLiked()
                ->withoutDisliked()
                ->onlyMale()
                ->ageRange()
                ->get();

        } elseif ($user->interested_in == 'female') {

            $users = User::inRandomOrder()
                ->withoutMe()
                ->withoutLiked()
                ->withoutDisliked()
                ->onlyFemale()
                ->ageRange()
                ->get();

        } else {

            $users = User::inRandomOrder()
                ->withoutMe()
                ->withoutLiked()
                ->withoutDisliked()
                ->ageRange()
                ->get();
        }

        return view('show-all', [
            'users' => $users,

        ]);
    }
}
