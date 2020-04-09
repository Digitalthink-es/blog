<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

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
}
