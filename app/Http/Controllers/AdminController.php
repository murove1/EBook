<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('dashboard.index');
	}

	public function books()
	{
		return view('dashboard.books');
	}

	public function categories()
	{
		return view('dashboard.categories');
	}

	public function users()
	{
		return view('dashboard.users');
	}

	public function messages()
	{
		return view('dashboard.messages');
	}
}