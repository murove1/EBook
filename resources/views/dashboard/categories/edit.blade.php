@extends('layouts.dashboard')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{ route('admin.book.index') }}">Керування категоріями</a></li>
			<li class="active">Змінити дані категорії:{{ $category->id }}</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{ $category->name }}</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Змінити дані категорії</div>
				<div class="panel-body">
					<div class="col-md-offset-3 col-md-6">

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

						<form role="form" method="post" action="{{ route('admin.category.update', $category->id) }}">
							<input type='hidden' name='_method' value='PUT'>
							{{ csrf_field() }}
							
							<div class="form-group">
								<label>Назва</label>
								<input type="text" class="form-control" name="name" placeholder="Назва категорії" value="{{ $category->name }}" required>
							</div>
	
							<button type="submit" class="btn btn-primary">Змінити</button>
						</form>
					</div>
					@endsection