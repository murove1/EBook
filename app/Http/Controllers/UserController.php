<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
	public function profile()
	{
		$user = Auth::user();
		return view('profile', ['user' => $user]);
	}

	//edit user info
	public function edit(){
		$user = Auth::user();
		return view('editprofile', ['user' => $user]);
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
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/img/avatar/' . $filename ) );
			$user->avatar = $filename;
		}

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');
		$user->save();
		return redirect('profile');
	}
}