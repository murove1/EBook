@extends('layouts.dashboard')

@section('title', 'Змінити дані '.$user->name.' ')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{ route('admin.users.index') }}">Керування користувачами</a></li>
			<li class="active">Змінити дані користувача:{{ $user->id }}</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $user->name }}</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Змінити дані користувача</div>
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

					<form role="form" method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
						<input type='hidden' name='_method' value='PUT'>
						{{ csrf_field() }}

						<div class="form-group">
							<label>Ім'я</label>
							<input type="text" class="form-control" name="name" placeholder="Ім'я" value="{{ $user->name }}" required>
						</div>

						<div class="form-group">
							<label>Е-мейл</label>
							<input type="email" class="form-control" name="email" placeholder="Е-мейл" value="{{ $user->email }}" required>
						</div>

						<div class="form-group">
							<label>Роль</label>
							<select class="form-control" name="roles">
								<option name="role_user">User</option>
								<option name="role_admin">Admin</option>
							</select>
						</div>

						<div class="form-group">
							<label>Про себе:</label>
							<textarea name="bio" class="form-control" style="resize:none;" rows="5">{{ $user->bio }}</textarea>
						</div>

						<div class="form-group">
							<label>Аватар</label>
							<input type="file" name="avatar">
							<p class="help-block">Виберіть зображення для оновлення аватару.</p>
						</div>

						<button type="submit" class="btn btn-primary">Змінити</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection