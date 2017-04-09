<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Auth;
use Image;

class UserController extends Controller
{
	//Access only to authorized users
	public function __construct()
	{
		$this->middleware('auth');
	}

	//show user profile
	public function show($id)
	{
		$user = Auth::user()->find($id);

		//User does not exist
		if ($user == null) {
			return redirect('/');
		}

		return view('profile.show', ['user' => $user]);
	}

	//edit user info
	public function edit($id){

		$user = Auth::user();

		//Users data protection
		if ($user != $user->find($id)) {
			return redirect()->route('user.show', $user->id);
		}

		return view('profile.edit', ['user' => $user]);
	}

	public function store($id)
	{
		$this->validate($request, [
			'name' => 'required|max:20',
			'email' => 'required',
			'bio' => 'max:255',
			'avatar' => 'image',
			]);

		$user = new User;
		
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = rand(11111111, 99999999). '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/upload/users/avatar/' . $filename ) );
			$user->avatar = $filename;
		}

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');

		$user->save();

		return redirect()->route('user.show', $user->id);
	}

	//update info user
	public function update(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:20',
			'email' => 'required',
			'bio' => 'max:255',
			'avatar' => 'image',
			]);

		$user = Auth::user();

		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = rand(11111111, 99999999). '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/upload/users/avatar/' . $filename ) );
			$user->avatar = $filename;
		}

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');

		$user->save();

		return redirect()->route('user.show', $user->id);
	}

	public function mybooks()
	{
		$books = Auth::user()->books;
		return view('profile.mybooks', ['books' => $books]);
	}
}