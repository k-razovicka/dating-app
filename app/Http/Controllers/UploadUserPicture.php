<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class UploadUserPicture extends Controller
{
    public function __invoke(Faker $faker, Request $request)
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                DB::table('pictures')->insert([
                    'user_id' => auth()->user()->id,
                    'name' => $faker->firstName,
                    'picture_location' => $file->store('profilePictures')
                ]);
            }
        }
        return redirect()->back()->with('status', 'Pictures has been uploaded!');
    }
}
