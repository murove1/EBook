   @extends('layouts.dashboard')

   @section('title', 'Панель керування')

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
   						<div class="large">{{ $count_books = DB::table('books')->count() }}</div>
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
   						<div class="large">{{ $count_category = DB::table('categories')->count() }}</div>
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
   						<div class="large">{{ $count_users = DB::table('users')->count() }}</div>
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
   						<div class="large">{{ $count_messages = DB::table('messages')->count() }}</div>
   						<div class="text-muted">Повідомлень</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!--/.row-->

      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading">Привіт! {{ Auth::user()->name}}.</div>
               <div class="panel-body">
                  Це сторінка панелі керування сайту EBook.
               </div>
            </div>
         </div>
      </div><!--/.row-->

      <div class="row">
         <div class="col-md-7">
            <div class="panel panel-default">
               <div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"></use></svg> 10 нових книг</div>
               <div class="panel-body table-responsive">
                  <table class="table table-bordered">
                     <thead>
                      <tr>
                         <th>ID</th>
                         <th>Назва</th>
                         <th>Автор</th>
                         <th>Рік видання</th>
                         <th>Сторінок</th>
                         <th>Категорія</th>
                         <th>Додано</th>
                         <th>Керування</th>
                      </tr>
                   </thead>
                   <tbody>
                    @foreach($books as $book)
                    <tr>
                       <td>{{ $book->id }}</td>
                       <td>{{ $book->title }}</td>
                       <td>{{ $book->author }}</td>
                       <td>{{ $book->year }}</td>
                       <td>{{ $book->page }}</td>
                       <td>{{ $book->category->name }}</td>
                       <td>{{ $book->created_at->format('d/m/y') }}</td>
                       <td>
                        <a href="{{route('admin.book.edit', $book->id)}}"><button class="btn btn-primary" style="float: left; margin-right: 5px;"><i class="glyphicon glyphicon-pencil"></i> </button></a>
                        <form action="{{ route('admin.book.destroy', $book->id) }}" method="POST">
                         <input type="hidden" name="_method" value="DELETE">
                         {{ csrf_field() }}
                         <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </button>
                      </form>
                   </td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </div>
 <div class="col-md-5">
   <div class="panel panel-default">
      <div class="panel-heading"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 10 нових користувачів</div>
      <div class="panel-body table-responsive">
         <table class="table table-bordered">
            <thead>
             <tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Дата реєстрації</th>
                <th>Керування</th>
             </tr>
          </thead>
          <tbody>
           @foreach($users as $user)
           <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles->first()->name }}</td>
              <td>{{ $user->created_at->format('d/m/y') }}</td>
              <td>
               <a href="{{route('admin.user.edit', $user->id)}}"><button class="btn btn-primary" style="float: left; margin-right: 5px;"><i class="glyphicon glyphicon-pencil"></i> </button></a>
               <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </button>
             </form>
          </td>
       </tr>
       @endforeach
    </tbody>
 </table>
</div>
</div>
</div>
</div><!--/.row-->
</div>  <!--/.main-->
@endsection