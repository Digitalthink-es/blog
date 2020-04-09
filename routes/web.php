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

// Listado de posts
Route::get('blog', 'Web\PageController@blog')->name('blog');

// Detalle de un post
Route::get('blog/{slug}', 'Web\PageController@post')->name('post');