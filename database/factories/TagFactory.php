<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(5); // 1 palabra única de 5 caracteres
    return [
        'name' => $title,
        'slug' => Str::slug($title),
    ];
});
