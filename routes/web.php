<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', 'EditUserProfileController')->name('profile.edit');
    Route::put('/profile', 'UpdateUserProfileController')->name('profile.update');
    Route::get('/show-all', 'ShowAllUsersController')->name('users.show-all');
    Route::get('/show-all/{user}/view', 'ShowUserInfoController')->name('users.show-user');
    Route::put('/show-all/{user}/view', 'LikeUserController')->name('users.like-user');
    Route::get('/likes', 'ViewLikesController')->name('view-likes');
    Route::get('/users/{user}/pictures', 'ShowUserPictures')->name('pictures');
    Route::get('/my-pictures', 'ShowAuthorizedUserPicture')->name('my-pictures');
    Route::post('/my-pictures', 'UploadUserPicture')->name('pictures.upload');
});


