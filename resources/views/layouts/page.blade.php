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

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- disqus js -->
  <script id="dsq-count-scr" src="//ebook-3.disqus.com/count.js" async></script>

  <!-- social -->
  <script defer src="/js/share.js"></script>
  
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
                  <li><a href="{{ route('user.show', Auth::user()->id)}}"><span class="glyphicon glyphicon-user"></span> Мій Профіль</a>
                  </li>
                  <li>
                    <li><a href="{{ route('mybooks') }}"><span class="glyphicon glyphicon-book"></span> Моя Бібліотека</a></li>
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

        <!-- Carousel -->
        <div id="Carousel" class="hidden-xs carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="/img/slider/slide1.jpeg" alt="Перший слайд">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Електронна бібліотека</h1>
                  <p>Розподілена інформаційна система, що дозволяє зберігати і використовувати різнорідні колекції електронних документів.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="/img/slider/slide3.jpeg" alt="Третій слайд">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Вислів про книгу</h1>
                  <p>"Хто полюбить книгу, той далеко піде у своєму розвитку. Книга рятує душу від здерев’яніння." - Шевченко Т. Г.</p>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="/img/slider/slide2.jpeg" alt="Другий слайд">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Вислів про книгу</h1>
                  <p>"Хто полюбить книгу, той далеко піде у своєму розвитку. Книга рятує душу від здерев’яніння." - Шевченко Т. Г.</p>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#Carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Попередня</span>
          </a>
          <a class="right carousel-control" href="#Carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Наступна</span>
          </a>
        </div>
        <!-- /Carousel -->

        <!-- Container -->
        <div class="container">

          <!-- Menu -->
          <div class="col-md-3">
           <div class="panel panel-default">
            <div class="panel-heading">
              <form role="form" method="get" action="{{ route('book.index') }}">
               <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Пошук" value="{{ isset($search) ? $search : '' }}">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
              </div>
            </form>
          </div>

        </div>
        <div class="panel-group" id="accordion">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book">
                </span> Книги</a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
                <table class="table">
                  <tr>
                    <td>
                      <span class="glyphicon glyphicon-eye-open"></span><a href="{{ route('book.topview') }}"> Топ переглядів</a>
                    </td>
                  </tr>
                  <tr>
                    <tr>
                      <td>
                        <span class="glyphicon glyphicon-heart"></span><a href="{{ route('book.toplike') }}"> Топ вподобань</a>
                      </td>
                    </tr>
                    <td>
                      <span class="glyphicon glyphicon-time"></span><a href="{{ route('book.updated') }}"> Обновлені</a>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  <span class="glyphicon glyphicon-bookmark"></span> Жанри</a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  <table class="table">

                    @foreach($categories as $category)
                    <tr>
                      <td>
                       <span class="glyphicon glyphicon-bookmark">
                       </span> <a href="{{ route('book.categories',$category->id) }}">{{ $category->name }}</a>
                     </td>
                   </tr>
                   @endforeach

                 </table>
               </div>
             </div>
           </div>
           <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-globe">
                </span> Ми в Соцмережах</a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
                <a href="https://t.me/ebooktk"><img src="/img/social/telegram.png" alt="telegram" width="225px" height="65px"></a>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <!-- /Menu --> 

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
  </html>