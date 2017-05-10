@extends('layouts.auth')

@section('title', 'Зворотній зв\'язок')

@section('content')
<div class="container">
	<div class="feedback-form">
		<a class="logo-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-book"></span> EBook</a>
		<form class="form-feedback" role="form" method="post" action="{{ route('feedback.store') }}">
			{{ csrf_field() }}
			<h2 class="form-feedback-heading">Зворотній зв'язок з EBook</h2>

			@if(Session::has('success'))
			<div class="alert alert-success" role="alert">
				{{ Session::get('success') }}
			</div>
			@endif
			
			<label for="name" class="sr-only">Ім'я</label>
			<input type="text" name="name" class="form-control" placeholder="Ім'я" required autofocus>
			<label for="email" class="sr-only">E-Mail</label>
			<input type="email" name="email" class="form-control" placeholder="E-Mail" required>
			<label for="message" class="sr-only">Повідомлення</label>
			<textarea class="form-control" name="message" rows="5" style="resize:none;"></textarea>
			<button class="btn btn-success btn-block" type="submit">Відправити</button>
		</form>
	</div>
</div> <!-- /container -->
@endsection