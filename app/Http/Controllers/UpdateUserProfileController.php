<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        /**  @var User $user */
        $user = auth()->user();

        if ($request->file('picture') != null) {
            Storage::delete($user->profile_picture);
            $user->update([
                'profile_picture' => $request->file('picture')
                    ->store('profilePictures')
            ]);
        }

        $user->update([
            'name' => $request->get('name'),
            'last_name' => $request->get('last-name'),
            'location' => $request->get('location'),
            'interested_in' => $request->get('interested_in'),
            'description' => $request->get('description'),
            'interested_min_age_range' => $request->get('min'),
            'interested_max_age_range' => $request->get('max')
        ]);

        return redirect()
            ->back()
            ->with('status', 'Profile has been updated');
    }
}
