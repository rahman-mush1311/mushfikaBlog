<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'user_id'=> factory(\App\User::class),
        'title' => $faker->title,
        'short'=> $faker->sentence,
        'des'=>$faker->paragraph
    ];
});
