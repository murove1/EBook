<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   //About pages
	public function about()
	{
		return view('about');
	}

	//About pages
	public function faq()
	{
		return view('faq');
	}
}
