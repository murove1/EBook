<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/img/favicon.ico">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>@yield('title')</title>

  <!-- Bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Scripts -->
  <script src="/js/jquery-1.12.4.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
      <script>
        window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
          ]) !!};
        </script>
        <!-- /Scripts -->
      </head>
      <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Відкрити навігацію</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> EBook</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Головна</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('about') }}">Про Сайт</a></li>
              </ul>
              <div class="nav navbar-nav navbar-right">
               <!-- Authentication caption -->
               @if (Auth::guest())
             <!-- <button type="button" class="btn btn-success">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Вхід
              </button> -->
              <li><a href="{{ route('login') }}">Вхід</a></li>
              <li><a href="{{ route('register') }}">Реєстрація</a></li>
              @else
              <li><a href="{{ route('book.create') }}" title="Додати книгу"><span class="glyphicon glyphicon-plus"></span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle_profile" data-toggle="dropdown" role="button" aria-expanded="false">
                  <img class="user-avatar" alt="avatar" src="/upload/users/avatar/{{ Auth::user()->avatar }}">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  @if ( Auth::user()->roles()->first()->name =='Admin' )
                  <li><a href="{{ route('dashboard')}}"><span class="glyphicon glyphicon-cog"></span> Панель керування</a></li>
                  @endif
                  <li><a href="{{ route('user.show', Auth::user()->id)}}"><span class="glyphicon glyphicon-user"></span> Мій Профіль</a></li>
                  <li><a href="{{ route('mybooks') }}"><span class="glyphicon glyphicon-book"></span> Моя Бібліотека</a></li>
                  <li>
                    <li><a href="{{ route('user.edit', Auth::user()->id) }}"><span class="glyphicon glyphicon-cog"></span> Мої Настройки</a></li>
                    <li><a href="{{ route('setting') }}"><span class="glyphicon glyphicon-lock"></span> Змінити пароль</a></li>
                    <li>
                      <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Вихід</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
                @endif
              </div>
            </div>
          </div>
        </nav>
        <!-- /Static navbar -->

        <!-- Container -->
        <div class="container">
          @yield('content')
        </div> 
        <!-- /Container -->


        <!-- footer -->
        <footer class="footer">
          <div class="container">
            <ul class="footer-links">
              <li><a href="{{ route('feedback.create') }}">Зворотній зв'язок</a></li>
              <li><a href="#top">Вверх</a></li>
              <li><strong>EBook © 2017</strong></li>
            </ul>
          </div>
        </footer>
        <!-- /footer -->
        
      </body>
      </html>