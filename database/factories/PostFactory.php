<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(4); // 4 palabras
    return [
        'user_id' => rand(1,30), // Nº aleatorio entre 1 y 30
        'category_id' => rand(1,20), // Nº aleatorio entre 1 y 20
        'name' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(200), // 200 caracteres
        'body' => $faker->text(500), // 500 caracteres
        'file' => $faker->imageUrl($width=1200, $height=400),
        'status' => $faker->randomElement(['DRAFT', 'PUBLISHED']),
    ];
});
