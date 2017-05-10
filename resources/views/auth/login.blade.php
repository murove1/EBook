@extends('layouts.auth')

@section('title', 'EBook | Вхід')

@section('content')
<div class="container">
    <div class="auth-form">
      <a class="logo-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-book"></span> EBook</a>
      <form class="auth-panel" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="auth-panel-heading">Вхід в EBook</h2>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">E-Mail</label>
            <input id="email" type="email" class="form-control" placeholder="E-Мейл" name="email" value="{{ old('email') }}" required autofocus> 

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
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запам'ятати мене
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Вхід</button>
            <!-- <a class="forgot_password" href="{{ route('password.request') }}">Забули свій пароль?</a> -->
            <hr>
            <p class="forgpass"><a href="{{ route('password.request') }}">Забули свій пароль?</a></p>
        </div>
    </form>
    <p class="create-account">Не зареєстровані? <a href="{{ route('register') }}">Створити аккаунт.</a></p>
</div>
</div>
@endsection
