<?php

namespace App\Http\Controllers;

class ShowAuthorizedUserPicture extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $pictures = $user->pictures()->get();

        return view('my-pictures', [
            'user' => $user,
            'pictures' => $pictures
        ]);
    }
}
