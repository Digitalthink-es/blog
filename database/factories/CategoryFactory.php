<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(4); // 4 palabras
    return [
        'name' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text(500), // 500 caracteres
    ];
});
