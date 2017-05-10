@extends('layouts.auth')

@section('title', 'EBook | Реєстрація')

@section('content')
<div class="container">
    <div class="auth-form">
      <a class="logo-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-book"></span> EBook</a>
      <form class="auth-panel" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <h2 class="auth-panel-heading">Реєстрація в EBook</h2>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="inputlogin" class="sr-only">Ім'я</label>
            <input id="name" type="text" class="form-control" placeholder="Ім'я" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">E-Mail</label>
            <input id="email" type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="sr-only">Пароль</label>
            <input id="password" type="password" class="form-control" placeholder="Пароль" name="password" required>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password-confirm" class="sr-only">Підтвердження пароля</label>
            <input id="password-confirm" type="password" class="form-control" 
            placeholder="Підтвердження пароля" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Реєстрація</button>
        </div>
    </form>
</div>
</div>
@endsection
