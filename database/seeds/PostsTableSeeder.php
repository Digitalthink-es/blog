<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 300)
        	->create() // Crea 300 posts
            ->each(function(App\Post $post) {
                $post->tags()->attach([
                    rand(1,5),
                    rand(6,14),
                    rand(15,20),
                ]); // Cada post creado los relacionamos con 3 etiquetas aleatorias
        }); // Por cada post creado
    }
}
