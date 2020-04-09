<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Raiz. Redirecciona al listado de posts
Route::redirect('/', 'blog');

// Rutas para autenticación
Auth::routes();

// Web
	// Listado de posts
	Route::get('blog', 			'Web\PageController@blog')->name('blog');

	// Detalle de un post
	Route::get('entrada/{slug}', 'Web\PageController@post')->name('post');

	// Listado de elementos de una categoría
	Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');

	// Listado de elementos de una etiqueta
	Route::get('etiqueta/{slug}', 'Web\PageController@tag')->name('tag');

// Admin
	Route::resource('tags', 		'Admin\TagController');
	Route::resource('categories', 	'Admin\CategoryController');
	Route::resource('posts', 		'Admin\PostController');