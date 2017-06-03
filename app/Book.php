<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{

	use Notifiable;
	
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

	//Search
	public function scopeSearch($query, $search)
	{
		return $query->where('title', 'like', '%' .$search. '%')
		->orWhere('body', 'like', '%' .$search. '%')
		->orWhere('author', 'like', '%' .$search. '%');
	}

	//Count Like
	public function scopeOrderByRelationCount($query, $relation, $direction = 'desc')
	{
		return $query->withCount($relation)->orderBy(snake_case($relation) . '_count', $direction);
	}
}