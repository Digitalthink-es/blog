<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PageController extends Controller
{
    // Mostrar listado de posts (paginado en 3 elementos), ordenados por los más nuevos primero y con estado Publicado (PUBLISHED)
    public function blog() 
    {
    	$posts = Post::orderBy('id', 'DESC')
    		->where('status', 'PUBLISHED')
    		->paginate(3);
    	
    	//dd($posts->first()->name);

    	return view('web.posts')
    			->with('posts', $posts);
    }

    // Obtener el post en base al slug de entrada
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('web.post')
            ->with('post', $post);
    }

    // Obtener lost posts filtrados según la categoría (slug de la categoría como parámetro de entrada)
    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->pluck('id')
            ->first();

        // Obtener todos los post de una categoría
        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')
            ->where('status', 'PUBLISHED')
            ->paginate(3);        

        return view('web.posts')
                ->with('posts', $posts);
    }

    // Obtener lost posts filtrados según la etiqueta (slug del post pasado como parámetro de entrada)
    public function tag($slug)
    {
        $posts = Post::whereHas('tags', function($query) use ($slug) {
            $query->where('slug', $slug);
        })->orderBy('id', 'DESC')
          ->where('status', 'PUBLISHED')
          ->paginate(3);        

        return view('web.posts')
                ->with('posts', $posts);
    }    
}
