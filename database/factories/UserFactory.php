<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement(['male', 'female']);
    $interestedIn = $faker->randomElement(['male', 'female', 'both']);
    $interestedMinAgeRange = $faker->numberBetween($min = 18, $max = 40);
    $interestedMaxAgeRange = $faker->numberBetween($min = 41, $max = 90);

    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'location' => $faker->randomElement(['Auce', 'Bauska', 'Cēsis', 'Dobele', 'Engure', 'Jelgava', 'Mārupe', 'Olaine', 'Rīga', 'Talsi', 'Valmiera']),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(5),
        'sex' => $gender,
        'description' => $faker->realText(200),
        'birthday' => $faker->date('Y-m-d', '2002-12-31'),
        'interested_in' => $interestedIn,
        'interested_min_age_range' => $interestedMinAgeRange,
        'interested_max_age_range' => $interestedMaxAgeRange,
        'profile_picture' => 'https://loremflickr.com/320/240/human,face,person,portrait/?text=' . $faker->firstName
    ];
});
