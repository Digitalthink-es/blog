<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	// Permitir guardar datos de forma masiva (a través de un formulario que envía datos en forma de array)
	protected $fillable = [
		'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
	];

	// 1 post pertenece a un usuario
	public function user() 
	{
		return $this->belongsTo(User::class);
	}

	// 1 post pertenece a una categoría
	public function category() 
	{
		return $this->belongsTo(Category::class);
	}

	// 1 post puede tener muchas etiquetas
    public function tags()
    {
    	return $this->belongsToMany(Tag::class); 
    }
}
