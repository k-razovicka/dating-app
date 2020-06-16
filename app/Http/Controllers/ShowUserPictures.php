<?php

namespace App\Http\Controllers;

use App\User;

class ShowUserPictures extends Controller
{
    public function __invoke(User $user)
    {
        $pictures = $user->pictures()->latest()->get();

        return view('pictures', [
            'user' => $user,
            'pictures' => $pictures
        ]);
    }
}
