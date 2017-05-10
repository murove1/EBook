@extends('layouts.dashboard')

@section('title', 'Додати категорію')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li><a href="{{ route('admin.categories.index') }}">Керування категоріями</a></li>
			<li class="active">Додати категорію</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Додати нову категорію</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Додати нову категорію на сайт</div>
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

					<form role="form" method="post" action="{{ route('admin.category.store') }}">
						
						{{ csrf_field() }}

						<div class="form-group">
							<label>Назва</label>
							<input type="text" class="form-control" name="name" placeholder="Назва категорії" required>
						</div>

						<button type="submit" class="btn btn-primary">Додати</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection