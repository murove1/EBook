@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="reset-form">
      <a class="logo-brand" href="/"><span class="glyphicon glyphicon-book"></span> EBook</a>
      <form class="form-reset" role="form" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <h2 class="form-reset-heading">Відновити пароль від EBook</h2>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">Е-мейл</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Е-мейл" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Відправити</button>
        </div>
    </form>
</div>
</div>

@endsection
