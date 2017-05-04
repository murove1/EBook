<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Message;
use App\User;
use App\Role;
use Image;
use Auth;
use Session;
use Datatables;

class AdminController extends Controller
{
	//Access only Admin
	public function __construct()
	{
		$this->middleware('admin');
	}

	//Output main page admin panel
	public function index()
	{
		return view('dashboard.index');
	}

	//Output message page panel
	public function messages()
	{
		$messages = Message::All();

		return view('dashboard.messages', ['messages' => $messages]);
	}

	//Control Books for admin

	//Output books page panel
	public function books()
	{
		return view('dashboard.book.books');
	}

	//Get books to table 
	public function getbook()
	{
		$books = Book::select('*');
		return Datatables::of($books)
		->addColumn('action', function ($book) {
			return '<a href="/dashboard/book/edit/'.$book->id.'" class="btn btn-xs  btn-primary" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-edit"></i> Змінити</a>

			<form action="/dashboard/book/destroy/'.$book->id.'" method="POST"><input type="hidden" name="_method" value="DELETE">
				'.csrf_field().'
				<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Видалити</button>
			</form>';
		})
		->editColumn('created_at', function ($book) {
			return $book->created_at->format('d/m/y');
		})
		->editColumn('updated_at', function ($book) {
			return $book->updated_at->format('d/m/y');
		})
		->editColumn('category', function ($book) {
			return $book->category->name;
		})
		->editColumn('user', function ($book) {
			return $book->user->name;
		})
		->make(true);
	}

	//Create new book
	public function create_book()
	{
		$categories = Category::all();

		return view('dashboard.book.create', ['categories' => $categories]);
	}

	//Add Book to database
	public function store_book(Request $request)
	{
		//validate data
		$this->validate($request, [
			'title' => 'required|max:50',
			'author' => 'required|max:50',
			'year' => 'required|integer',
			'page' => 'required|integer',
			'body' => 'required|max:255',
			'category_id' => 'required|integer',
			'book_img' => 'image',
			'book_file' => 'required|mimes:pdf,docx,doc',
			]);

		$book = new Book;

		//save book data
		$book->title = $request->input('title');
		$book->author = $request->input('author');
		$book->year = $request->input('year');
		$book->page = $request->input('page');
		$book->body = $request->input('body');
		$book->category_id = $request->category_id;
		$book->user_id = Auth::user()->id;
		
		//save book file
		if($request->hasFile('book_file')){
			$book_file = $request->file('book_file');
			$filename = rand(11111111, 99999999). '.' . $book_file->extension();
			$book_file->move( public_path() .'/upload/books/file/' , $filename );
			$book->book_file = $filename;
		}

		//save book image
		if($request->hasFile('book_img')){
			$book_img = $request->file('book_img');
			$filename = rand(11111111, 99999999). '.' . $book_img->getClientOriginalExtension();
			Image::make($book_img)->resize(160, 230)->save( public_path('/upload/books/img/' . $filename ) );
			$book->book_img = $filename;
		}

		$book->save();

		//Telegram Notification if book add
		if($request->input('telegram_notification') == 1){
			file_get_contents('https://api.telegram.org/bot346608259:AAGnmJEREq-s6W3aiTUKMfSVJ1csgqXFeCM/sendMessage?chat_id=-1001068698923&text= На+сайт+завантажена+нова+книга: ' .$book->title );
		}

		return redirect()->route('book.show', $book->id);
	}

	//Edit book
	public function edit_book($id)
	{
		$book = Book::find($id);
		
		$categories = Category::all();

		return view('dashboard.book.edit', ['book' => $book], ['categories' => $categories]);
	}

	//Update data book
	public function update_book(Request $request, $id)
	{
		//validate data
		$this->validate($request, [
			'title' => 'required|max:50',
			'author' => 'required|max:50',
			'year' => 'required|integer',
			'page' => 'required|integer',
			'body' => 'required|max:255',
			'category_id' => 'required|integer',
			'book_img' => 'image',
			'book_file' => 'mimes:pdf,docx,doc',
			]);

		$book = Book::find($id);

		//save update book data
		$book->title = $request->input('title');
		$book->author = $request->input('author');
		$book->year = $request->input('year');
		$book->page = $request->input('page');
		$book->body = $request->input('body');
		$book->category_id = $request->category_id;
		
		//save book file
		if($request->hasFile('book_file')){
			$book_file = $request->file('book_file');
			$filename = rand(11111111, 99999999). '.' . $book_file->extension();
			$book_file->move( public_path() .'/upload/books/file/' , $filename );
			$book->book_file = $filename;
		}

		//save book image
		if($request->hasFile('book_img')){
			$book_img = $request->file('book_img');
			$filename = rand(11111111, 99999999). '.' . $book_img->getClientOriginalExtension();
			Image::make($book_img)->resize(160, 230)->save( public_path('/upload/books/img/' . $filename ) );
			$book->book_img = $filename;
		}

		$book->save();

		return redirect('dashboard/books');
	}

	//Delete book
	public function destroy_book($id)
	{
		$book = Book::find($id);

		//delete book
		$book->delete();

		return redirect('dashboard/books');
	}

 	//Control Users for admin

	//Output users page panel
	public function users()
	{
		$users = User::All();

		return view('dashboard.users', ['users' => $users]);
	}

	public function getusers()
	{
		$users = User::select('*');
		return Datatables::of($users)
		->addColumn('action', function ($user) {
			return '<a href="/dashboard/user/edit/'.$user->id.'" class="btn btn-xs  btn-primary" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-edit"></i> Змінити</a>

			<form action="/dashboard/user/destroy/'.$user->id.'" method="POST"><input type="hidden" name="_method" value="DELETE">
				'.csrf_field().'
				<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Видалити</button>
			</form>';
		})
		->editColumn('roles', function ($user) {
			$role = $user->roles->first()->name;
			return $role;
		})
		->editColumn('created_at', function ($user) {
			return $user->created_at->format('d/m/y');
		})
		->editColumn('books', function ($user) {
			return $user->books->count();
		})
		->make(true);
	}

	//Edit user
	public function edit_user($id)
	{
		$user = User::find($id);

		return view('dashboard.users.edit', ['user' => $user]);
	}

	//Update info user
	public function update_user(Request $request, $id)
	{
		$user = User::find($id);

		$this->validate($request, [
			'name' => 'required|max:20',
			'email' => 'required|unique:users,email,' . $user->id,
			'bio' => 'max:255',
			'avatar' => 'image',
			]);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');
		
		//Roles user
		// dd($request);
		
		if($request->input('roles') == 'User'){
			$user->roles()->detach();
			$user->roles()->attach(Role::where('name', 'User')->first());
		}

		if($request->input('roles') == 'Admin'){
			$user->roles()->detach();
			$user->roles()->attach(Role::where('name', 'Admin')->first());
		}


		//If uploaded avatar add to base
		if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			$filename = rand(11111111, 99999999). '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save( public_path('/upload/users/avatar/' . $filename ) );
			$user->avatar = $filename;
		}
		//Save upload data
		$user->save();

		return redirect()->route('admin.users.index');
	}

	//Delete user
	public function destroy_user($id)
	{
		$user = User::find($id);

		//delete user
		$user->delete();

		return redirect()->route('admin.users.index');
	}

	//Control Category for admin

	//Output categories page panel
	public function categories()
	{
		return view('dashboard.categories.categories');
	}

	public function getcategories()
	{
		$categories = Category::select('*');
		return Datatables::of($categories)
		->addColumn('action', function ($category) {
			return '<a href="/dashboard/category/edit/'.$category->id.'" class="btn btn-xs  btn-primary" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-edit"></i> Змінити</a>

			<form action="/dashboard/category/destroy/'.$category->id.'" method="POST"><input type="hidden" name="_method" value="DELETE">
				'.csrf_field().'
				<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Видалити</button>
			</form>';
		})
		->editColumn('created_at', function ($book) {
			return $book->created_at->format('d/m/y');
		})
		->editColumn('updated_at', function ($book) {
			return$book->updated_at->format('d/m/y');
		})
		->make(true);
	}

	//Create new category
	public function create_category()
	{
		return view('dashboard.categories.create');
	}

	//Add new  category
	public function store_category(Request $request)
	{
		//validate data
		$this->validate($request, [
			'name' => 'required|max:30',
			]);

		$category = new Category;

		//save category data
		$category->name = $request->input('name');

		$category->save();

		return redirect()->route('admin.categories.index');
	}

	//Edit category
	public function edit_category($id)
	{
		$category = Category::find($id);

		return view('dashboard.categories.edit', ['category' => $category]);
	}

	//Update category
	public function update_category(Request $request, $id)
	{
				//validate data
		$this->validate($request, [
			'name' => 'required|max:30',
			]);

		$category = Category::find($id);

		//save category data
		$category->name = $request->input('name');

		$category->save();

		return redirect()->route('admin.categories.index');
	}

	//Delete category
	public function destroy_category($id)
	{
		$category = Category::find($id);

		//delete category
		$category->delete();

		return redirect()->route('admin.categories.index');
	}

	//Output form for send message telegram
	public function telegram()
	{
		return view('dashboard.telegram');
	}

	public function store_telegram(Request $request)
	{
		//validate data
		$this->validate($request, [
			'text' => 'required|max:300',
			]);

		$text = $request->input('text');

		file_get_contents('https://api.telegram.org/bot346608259:AAGnmJEREq-s6W3aiTUKMfSVJ1csgqXFeCM/sendMessage?chat_id=-1001068698923&text=' .$text);

		Session::flash('success','Повідомлення успішно відправлено!');

		return redirect()->route('admin.telegram.index');
	}

}