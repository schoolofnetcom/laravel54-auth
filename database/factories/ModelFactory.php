<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'cpf' => str_random(11)
    ];
});

$factory->state(\App\User::class, 'admin', function($faker){
    return [
        'role' => \App\User::ROLE_ADMIN
    ];
});

$factory->state(\App\User::class, 'user', function($faker){
    return [
        'role' => \App\User::ROLE_USER
    ];
});