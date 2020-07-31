<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$T8yrHL4NGIqi.1kUpJpm4eACuACQ1KtFFwo3h3bD.oomyYMKWoxty', // password
        'activated' => 1,
        'remember_token' => Str::random(10),
        'avatar' => 'http://localhost:8000/images/default_avatar.png',
        'created_at' => $date_time,
        'updated_at' => $date_time
    ];
});
