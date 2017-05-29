@extends('layouts.auth')

@section('title', 'EBook | Відновлення паролю')

@section('content')
<div class="container">
    <div class="reset-form">
      <a class="logo-brand" href="/"><span class="glyphicon glyphicon-book"></span> EBook</a>
      <form class="form-reset" role="form" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <h2 class="form-reset-heading">Відновити пароль від EBook</h2>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  
            <input class="form-control" id="email" type="email" name="email" placeholder="Емейл" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="form-control" id="password" type="password" name="password" placeholder="Пароль">


            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" placeholder="Пароль ще раз" required>

            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                Відновити
            </button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection