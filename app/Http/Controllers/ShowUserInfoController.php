<?php

namespace App\Http\Controllers;

use App\User;

class ShowUserInfoController extends Controller
{
    public function __invoke(User $user)
    {
        return view('view', [
            'user' => $user,

        ]);
    }
}
