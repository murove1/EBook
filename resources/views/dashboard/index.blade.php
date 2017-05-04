   @extends('layouts.dashboard')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
   	<div class="row">
   		<ol class="breadcrumb">
   			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
   			<li class="active">Головна</li>
   		</ol>
   	</div><!--/.row-->

   	<div class="row">
   		<div class="col-lg-12">
   			<h1 class="page-header">Панель керування</h1>
   		</div>
   	</div><!--/.row-->

   	<div class="row">
   		<div class="col-xs-12 col-md-6 col-lg-3">
   			<div class="panel panel-blue panel-widget ">
   				<div class="row no-padding">
   					<div class="col-sm-3 col-lg-5 widget-left">
   						<svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
   					</div>
   					<div class="col-sm-9 col-lg-7 widget-right">
   						<div class="large">{{ $books = DB::table('books')->count() }}</div>
   						<div class="text-muted">Книги</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		<div class="col-xs-12 col-md-6 col-lg-3">
   			<div class="panel panel-orange panel-widget">
   				<div class="row no-padding">
   					<div class="col-sm-3 col-lg-5 widget-left">
   						<svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg>
   					</div>
   					<div class="col-sm-9 col-lg-7 widget-right">
   						<div class="large">{{ $category = DB::table('categories')->count() }}</div>
   						<div class="text-muted">Категорії</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		<div class="col-xs-12 col-md-6 col-lg-3">
   			<div class="panel panel-teal panel-widget">
   				<div class="row no-padding">
   					<div class="col-sm-3 col-lg-5 widget-left">
   						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
   					</div>
   					<div class="col-sm-9 col-lg-7 widget-right">
   						<div class="large">{{ $users = DB::table('users')->count() }}</div>
   						<div class="text-muted">Користувачів</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		<div class="col-xs-12 col-md-6 col-lg-3">
   			<div class="panel panel-red panel-widget">
   				<div class="row no-padding">
   					<div class="col-sm-3 col-lg-5 widget-left">
   						<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg>
   					</div>
   					<div class="col-sm-9 col-lg-7 widget-right">
   						<div class="large">{{ $messages = DB::table('messages')->count() }}</div>
   						<div class="text-muted">Повідомлень</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!--/.row-->

   	<div class="row">
   		<div class="col-lg-12">
   			<div class="panel panel-default">
   				<div class="panel-heading">Привіт {{ Auth::user()->name }}</div>
   				<div class="panel-body">
   					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero commodi vel ullam est necessitatibus perferendis quia, ea velit officiis, mollitia iure unde aspernatur. Sint nisi, accusamus neque repellat impedit laudantium.
   				</div>
   			</div>
   		</div>
   	</div><!--/.row-->
   </div>  <!--/.main-->
   @endsection