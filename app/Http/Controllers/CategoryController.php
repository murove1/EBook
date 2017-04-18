<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	//Output of categories to home page
	public function index()
	{

	}

	//
	public function show()
	{

	}

	//Create new category
	public function create()
	{

	}

	//Add category to database
	public function store()
	{

	}

	//Edit category
	public function edit()
	{

	}

	//Update category
	public function update()
	{

	}

	//Delete category
	public function destroy($id)
	{
		$category->delete();
		
		return redirect('');
	}
}