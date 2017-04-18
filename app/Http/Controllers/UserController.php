<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Auth;
use Image;
use Session;

class UserController extends Controller
{
	//Access only to authorized users
	public function __construct()
	{
		$this->middleware('auth', ['except'=> ['show']]);
	}

	//Show user profile
	public function show($id)
	{
		$user = User::find($id);

		//User does not exist
		if ($user == null) {

			return redirect('/');
		}

		return view('profile.show', ['user' => $user]);
	}

	//Edit user info
	public function edit($id)
	{
		$user = Auth::user();

		//Users data protection
		if ($user != Auth::user()->find($id)) {

			return redirect()->route('user.edit', Auth::user()->id);
		}

		return view('profile.edit', ['user' => $user]);
	}

	public function store(Request $request)
	{
		//
	}

	//update info user
	public function update(Request $request)
	{
		$user = Auth::user();

		$this->validate($request, [
			'name' => 'required|max:20',
			'email' => 'required|unique:users,email,' . $user->id,
			'bio' => 'max:255',
			'avatar' => 'image',
			]);


		//If uploaded avatar add to base
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = rand(11111111, 99999999). '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/upload/users/avatar/' . $filename ) );
			$user->avatar = $filename;
		}

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');

		//Save upload data
		$user->save();

		return redirect()->route('user.show', $user->id);
	}

	//User's books
	public function mybooks()
	{
		$books = Auth::user()->books;
		return view('profile.mybooks', ['books' => $books]);
	}

	//Show page Change password
	public function setting()
	{
		return view('profile.setting');
	}

	//Change password
	public function updatepassword(Request $request)
	{
		$user = Auth::user();

		$this->validate($request, [
			'password' => 'required|min:6|max:20',
			]);

		
		$user->password = bcrypt($request->input('password'));
		 //dd($user->password);
		$user->save();

		Session::flash('success','Пароль успішно змінений!');

		return redirect('setting');
	}

}