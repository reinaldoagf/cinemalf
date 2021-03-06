<?php

use Faker\Generator as Faker;

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

$factory->define(Cinema\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'typeofuser'=>'Tradicional',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Movie::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
    	'cast' => $faker->name,
    	'direction' => $faker->name,
    	'duration' => rand(1, 3),
    ];
});
