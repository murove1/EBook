@extends('layouts.dashboard')

@section('title', 'Змінити дані | '.$book->title.'')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{ route('admin.book.index') }}">Керування книгами</a></li>
			<li class="active">Змінити дані книги:{{ $book->id }}</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $book->title }}</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Змінити дані книги</div>
				<div class="panel-body">
					
					<!-- Errors -->
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<!-- /Errors -->

					<form role="form" method="post" action="{{ route('admin.book.update', $book->id) }}" enctype="multipart/form-data">
						<input type='hidden' name='_method' value='PUT'>
						{{ csrf_field() }}
						
						<div class="form-group">
							<label>Назва</label>
							<input type="text" class="form-control" name="title" placeholder="Назва книги" value="{{ $book->title }}" required>
						</div>

						<div class="form-group">
							<label>Автор</label>
							<input type="text" class="form-control" name="author" placeholder="Автор" value="{{ $book->author }}" required>
						</div>

						<div class="form-group">
							<label>Рік видання</label>
							<input type="text" class="form-control" name="year" placeholder="Рік видання" value="{{ $book->year }}" required>
						</div>

						<div class="form-group">
							<label>Сторінки</label>
							<input type="text" class="form-control" name="page" placeholder="Сторінки" value="{{ $book->page }}" required>
						</div>

						<div class="form-group">
							<label>Жанр</label>
							<select class="form-control" name="category_id">

								@foreach($categories as $category)
								<option value='{{ $category->id }}'>{{ $category->name }}</option>
								@endforeach

							</select>
						</div>

						<div class="form-group">
							<label>Опис</label>
							<textarea name="body" class="form-control" style="resize:none;" rows="5" required>{{ $book->body }}</textarea>
						</div>

						<div class="form-group">
							<label>Завантажити зображення книги</label>
							<input type="file" name="book_img">
							<p class="help-block">Виберіть зображення для завантаження.</p>
						</div>

						<div class="form-group">
							<label>Завантажити книгу</label>
							<input type="file" name="book_file">
							<p class="help-block">Виберіть книгу формату PDF,DOC,DOCX для завантаження.</p>
						</div>
						
						<button type="submit" class="btn btn-primary">Змінити</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection