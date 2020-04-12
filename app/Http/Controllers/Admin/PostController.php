<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
  /**
     * Constructor. Securiza las llamadas a los métodos
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();
        //dd($posts);

        return view('admin.posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Seleccionar el nombre y el id de las categorías
        $categories = Category::orderBy('name', 'ASC')
            ->pluck('name', 'id');
        // Seleccionar el registro entero de cada etiqueta
        $tags = Tag::orderBy('name', 'ASC')
            ->get();

        return view('admin.posts.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());

        // Imagen
            // Si viene un archivo lo almacenamos en disco y actualizamos el post creado
            $imagen = $request->file('file'); 
            if ($imagen)
            {
                $path = Storage::disk('public')
                            ->put('images', $imagen); // Subir la imagen
                $post->fill(['file' => asset($path)])
                     ->save(); // Actualizar el post creado
            }

        // Etiquetas
            $post->tags()->attach($request->get('tags')); // attach crea las relaciones

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Se consulta la política de autorización
        $this->authorize('pass', $post); // Método pass

        // Seleccionar el nombre y el id de las categorías
        $categories = Category::orderBy('name', 'ASC')
            ->pluck('name', 'id');
        // Seleccionar el registro entero de cada etiqueta
        $tags = Tag::orderBy('name', 'ASC')
            ->get();        

        return view('admin.posts.edit')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('post', $post);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);

        // Se consulta la política de autorización
        $this->authorize('pass', $post); // Método pass

        $post->fill($request->all())
            ->save();

        // Imagen
            // Si viene un archivo lo almacenamos en disco y actualizamos el post creado
            $imagen = $request->file('file'); 
            if ($imagen)
            {
                $path = Storage::disk('public')
                            ->put('images', $imagen); // Subir la imagen
                $post->fill(['file' => asset($path)])
                     ->save(); // Actualizar el post creado
            }

        // Etiquetas
            $post->tags()->sync($request->get('tags')); // sync tiene en cuenta si ya existen las relaciones y las actualiza

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        // Se consulta la política de autorización
        $this->authorize('pass', $post); // Método pass

        $post->delete();

        return back()
            ->with('info', "Registro con id $id eliminado corréctamente");
    }
}