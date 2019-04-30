<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Mail\Message;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $role = ['user', 'doctor'];
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'role' => array_random($role),
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10)
    ];
});


$factory->define(App\Message::class, function (Faker $faker) {
    do {
        $from = rand(1, 10);
        $to = rand(1, 10);
    } while ($from === $to);


    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
    ];
});