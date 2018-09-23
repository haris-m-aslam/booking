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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
        'is_admin' => $faker->randomElement([1,0]),
    ];
});

$factory->define(App\Seat::class, function (Faker $faker) {
    return [
        'name' => 'A'.$faker->unique()->numberBetween(1,20),
    ];
});

$factory->define(App\Film::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'image' => $faker->image()
    ];
});

$factory->define(App\ShowTime::class, function (Faker $faker) {
    return [
        'slot' => $faker->dateTimeBetween('+1 day', '+2 week'),
        'film_id' => App\Film::all()->random()->id
    ];
});