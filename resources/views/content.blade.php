 @extends('layouts.page')

 @section('content')
 <!-- Menu -->
 <div class="col-md-3">
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="input-group">
        <input type="text" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
        </button>
    </span>
</div>
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
                            <span class="glyphicon glyphicon-eye-open"></span><a href="#"> Топ переглядів</a>
                        </td>
                    </tr>
                    <tr>
                        <tr>
                            <td>
                                <span class="glyphicon glyphicon-heart"></span><a href="#"> Топ вподобань</a>
                            </td>
                        </tr>
                        <td>
                        <span class="glyphicon glyphicon-time"></span><a href="#"> Новинки</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-bookmark">
                </span> Жанри</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">Тест</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

</div> 
<!-- /Menu --> 

<!-- Content -->
<div class="col-md-9">
  <div class="row">
    @foreach($books as $book)
    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
        <a href="{{ url('/book', $book->id) }}"><img src="/upload/books/img/{{ $book->book_img }}" alt="{{ $book->title }}"></a>
        <div class="caption">
          <h4><a href="{{ url('/book', $book->id) }}">{{ $book->title }}</a></h4>
          <p>{{ substr($book->body, 0, 285) }}{{ strlen($book->body) > 285 ? "...": "" }}</p>
      </div>
      <div class="ratings">
          <p class="pull-right"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 1225 </p>
          <p class="pull-right"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 100 </p>
          <p> <span class="glyphicon glyphicon-bookmark"></span> {{ $book->category->name }}</p>
      </div>
  </div>
</div>
@endforeach

<!-- Pagination -->
</div>
<div class="col-md-12 text-center">
    {{ $books->links()}}
</div>
</div>
<!-- /Content -->
@endsection