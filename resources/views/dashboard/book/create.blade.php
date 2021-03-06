@extends('layouts.dashboard')

@section('title', 'Додати книгу')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{ route('admin.book.index') }}">Керування книгами</a></li>
			<li class="active">Додати книгу</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Додати нову книгу</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Додати нову книгу на сайт</div>
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

					<form role="form" method="post" action="{{ route('admin.book.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Назва</label>
							<input type="text" class="form-control" name="title" placeholder="Назва книги" required>
						</div>

						<div class="form-group">
							<label>Автор</label>
							<input type="text" class="form-control" name="author" placeholder="Автор" required>
						</div>

						<div class="form-group">
							<label>Рік видання</label>
							<input type="text" class="form-control" name="year" placeholder="Рік видання" required>
						</div>

						<div class="form-group">
							<label>Сторінки</label>
							<input type="text" class="form-control" name="page" placeholder="Сторінки" required>
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
							<textarea name="body" class="form-control" style="resize:none;" rows="5" required></textarea>
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

						<div class="checkbox">
							<label>
								<input type="checkbox" name="telegram_notification" value="1" checked> Відправити оповіщення в Telegram.
							</label>
						</div>

						<button type="submit" class="btn btn-primary">Додати</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection