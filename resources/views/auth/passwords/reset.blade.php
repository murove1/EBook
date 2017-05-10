@extends('layouts.auth')

@section('title', 'EBook | Відновлення паролю')

@section('content')
<div class="container">
    <div class="reset-pass">
      <a class="logo-brand" href="/"><span class="glyphicon glyphicon-book"></span> EBook</a>
      <form class="form-reset" role="form" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <h2 class="form-reset-heading">Скинути пароль від EBook</h2>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">Е-мейл</label>
            <input id="email" type="email" class="form-control" placeholder="Е-мейл" name="email" value="{{ $email or old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">Пароль</label>
            <input id="password" type="password" class="form-control" placeholder="Пароль" name="password" required>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="email" class="sr-only">Підтвердження пароля</label>
            <input id="password-confirm" type="password" class="form-control" placeholder="Підтвердження пароля" name="password_confirmation" required>

            @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Скинути</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
