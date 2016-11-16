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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url' => $faker->url,
        'description' => $faker->paragraph,
        'created_by' => 1,
        'modified_by' => 1,
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'created_by' => 1,
        'modified_by' => 1,
    ];
});

$factory->define(App\Blog::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'name' => ucwords($faker->word),
    ];
});

$factory->define(App\Faq::class, function (Faker\Generator $faker) {
    return [
        'question' => $faker->realText(100, 2),
        'answer' => $faker->realText(300, 3),
    ];
});

$factory->define(App\Visit::class, function (Faker\Generator $faker) {
    return [
        'ip' => $faker->ipv4,
    ];
});
