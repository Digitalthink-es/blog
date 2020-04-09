<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// Permitir guardar datos de forma masiva (a través de un formulario que envía datos en forma de array)
	protected $fillable = [
		'name', 'slug', 'body'
	];

	// 1 categoria puede tener muchos posts
    public function posts()
    {
    	return $this->hasMany(Post::class); // hasMany para relación de 1 a N 
    }
}
