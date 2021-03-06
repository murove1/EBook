<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Like;
use Image;
use Auth;
use Session;

class BookController extends Controller
{
  //Create,edit,delete only to authorized users
	public function __construct()
	{
		$this->middleware('auth', ['except'=> ['index', 'show', 'topview', 'toplike', 'updatedbooks', 'categoriesbooks']]);
	}

	//Output of books,search,categories to home page
	public function index(Request $request)
	{
		//Search book
		$search = $request->input('search');
		$books = Book::latest()
		->search($search)
		->orderBy('id')
		->paginate(9);
		
		return view('index', ['books' => $books], ['search' => $search]);
	}

	//Output book to book page
	public function show($id)
	{
		$book = Book::find($id);

		//If the book does not exist
		if ($book == null) {
			abort('404');
		}

		//book views
		$book->views += 1;
		$book->save();

		return view('book.show', ['book' => $book]);
	}

	//Create new book
	public function create()
	{
		$categories = Category::all();

		return view('book.create', ['categories' => $categories]);
	}

	//Add Book to database
	public function store(Request $request)
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
			$book->notify(new \App\Notifications\BookPublished());
		}

		return redirect()->route('book.show', $book->id);
	}

	public function edit($id)
	{
		$book = Book::find($id);

		$categories = Category::all();

		//If the book does not exist
		if ($book == null) {
			abort('404');
		}
		
		//Book data protection
		if ($book->user_id != Auth::user()->id) {
			return redirect()->route('mybooks');
		}

		return view('book.edit', ['book' => $book], ['categories' => $categories]);
	}

	public function update(Request $request, $id)
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

		return redirect()->route('book.show', $book->id);
	}

	//Delete book
	public function destroy($id)
	{
		$book = Book::find($id);

		//delete book
		$book->delete();
		
		return redirect()->route('mybooks');
	}
	
	//Show top view book page
	public function topview()
	{
		$books = Book::orderBy('views', 'desc')->paginate(9);
		
		return view('book.topview', ['books' => $books]);
	}

	//Show top like book page
	public function toplike()
	{
		$books = Book::orderByRelationCount('likes')->paginate(9);

		return view('book.toplike', ['books' => $books]);
	}

	//Show updated book page
	public function updatedbooks()
	{
		$books = Book::orderBy('updated_at', 'desc')->paginate(9);

		return view('book.updated', ['books' => $books]);
	}

	//Show books by category page
	public function categoriesbooks($id)
	{
		$category = Category::find($id);

		$books = $category->books()->paginate(9);

		return view('book.category', ['books' => $books], ['category' => $category]);
	}

	//Like book
	public function like(Request $request, $id)
	{
		if($request->ajax())
		{
			$book = Book::find($id);
			$user = Auth::user();

			$like = $user->likes()->where('book_id', $book->id)->first();

			if ($like) {
				$already_like = $like->like;

				if($already_like == 1) {
					$like->delete();
				}
			} 
			else {
				$like = new Like();
				$like->book_id = $book->id;
				$like->user_id = $user->id;
				$like->like = 1;
				$like->save();
			}	
		}
	}

	public function likecount(Request $request, $id)
	{
		if($request->ajax())
		{
			$book = Book::find($id);
			$count = $book->likes->count();
			return $count;
		}
	}
}