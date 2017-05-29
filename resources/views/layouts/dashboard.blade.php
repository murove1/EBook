<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/admin.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="/img/favicon.ico">

  <script src="/js/jquery-1.12.4.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

  <!--Icons-->
  <script src="/js/glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<!-- Scripts -->
<script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
  </script>
  <!-- /Scripts -->
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> EBook</a>
        <ul class="user-menu">
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-avatar" alt="avatar" src="/upload/users/avatar/{{ Auth::user()->avatar }}"> {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('user.show', Auth::user()->id)}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Мій Профіль</a></li>
              <li><a href="{{ route('user.edit', Auth::user()->id) }}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Мої Настройки</a></li>
              <li><a href="{{ route('setting') }}"><svg class="glyph stroked lock"><use xlink:href="#stroked-lock"/></svg> Змінити пароль</a></li>
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Вихід</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </div><!-- /.container-fluid -->
  </nav> 

  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
      <li role="presentation" class="divider"></li>
      <li><a href="{{ url('/') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Головна сайту</a></li>
      <li class="{{ Request::is('dashboard') ? "active" : "" }}"><a href="{{ route('dashboard') }}"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>Панель керування</a></li>
      <li class="{{ Request::is('dashboard/books') ? "active" : "" }}"><a href="{{ route('admin.book.index') }}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-folder"></use></svg>Керування книгами</a></li>
      <li class="{{ Request::is('dashboard/categories') ? "active" : "" }}"><a href="{{ route('admin.categories.index') }}"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
        Керування категоріями</a></li>
        <li class="{{ Request::is('dashboard/users') ? "active" : "" }}"><a href="{{ route('admin.users.index') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Керування користувачами</a></li>
        <li class="{{ Request::is('dashboard/messages') ? "active" : "" }}"><a href="{{ route('admin.messages.index') }}"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/></svg> Повідомлення <span class="badge">{{ $messages = DB::table('messages')->count() }}</span></a></li>
        <li class="{{ Request::is('dashboard/telegram') ? "active" : "" }}"><a href="{{ route('admin.telegram.index') }}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg> Telegram Бот</a></li>
        <li role="presentation" class="divider"></li>
      </ul>
    </div><!--/.sidebar-->

    @yield('content')

  </body>
  </html>