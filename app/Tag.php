<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	// Permitir guardar datos de forma masiva (a través de un formulario que envía datos en forma de array)
	protected $fillable = [
		'name', 'slug'
	];

	// 1 post puede tener muchos posts
    public function posts()
    {
    	return $this->belongsToMany(Post::class); 
    }
}
