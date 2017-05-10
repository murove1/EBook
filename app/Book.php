<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $table = 'books';

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function likes()
	{
		return $this->hasMany('App\Like');
	}

	public function scopeSearch($query, $search)
	{
		return $query->where('title', 'like', '%' .$search. '%')
		->orWhere('body', 'like', '%' .$search. '%')
		->orWhere('author', 'like', '%' .$search. '%');
	}

}