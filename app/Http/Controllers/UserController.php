<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Auth;
use Image;
use Session;
use Datatables;

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
			abort(404);
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

	//Update info user
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
		return view('profile.mybooks');
	}

	//Get Books user to table
	public function getmybooks()
	{
		$books = Auth::user()->books;
		return Datatables::of($books)
		->addColumn('action', function ($book) {
			return '<a href="/book/'.$book->id.'/edit/" class="btn btn-xs  btn-primary" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-edit"></i> Змінити</a>

			<form action="/book/'.$book->id.'" method="POST"><input type="hidden" name="_method" value="DELETE">
				'.csrf_field().'
				<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Видалити</button>
			</form>';
		})
		->editColumn('created_at', function ($book) {
			return $book->created_at->format('d/m/y');
		})
		->editColumn('rate', function ($book) {
			return $book->views .' / '. $book->likes->count();
		})
		->editColumn('category', function ($book) {
			return $book->category->name;
		})
		->make(true);
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

		$user->save();

		Session::flash('success','Пароль успішно змінений!');

		return redirect()->route('setting');
	}

}