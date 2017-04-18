<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Message;
use App\User;

class AdminController extends Controller
{
	//
	public function __construct()
	{
		$this->middleware('admin');
	}

	//
	public function index()
	{
		return view('dashboard.index');
	}

	//
	public function books()
	{
		$books = Book::orderBy('id')->paginate(5);
		return view('dashboard.books', ['books' => $books]);
	}

	//
	public function categories()
	{
		$categories = Category::orderBy('id')->paginate(1);
		return view('dashboard.categories', ['categories' => $categories]);
	}

	//
	public function users()
	{
		$users = User::All();
		return view('dashboard.users', ['users' => $users]);
	}

	//
	public function messages()
	{
		$messages = Message::All();
		return view('dashboard.messages', ['messages' => $messages]);
	}

	//
	public function telegram()
	{
		return view('dashboard.telegram');
	}
}