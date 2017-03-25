 @extends('layouts.page')

 @section('content')
 <div class="row">

  <!-- Menu -->
  <div class="col-md-3">

   <div class="panel panel-default">
    <div class="panel-heading text-center">Меню</div>
    <div class="panel-body">
     <div class="input-group">
      <input type="text" class="form-control">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </span>
    </div>
    <!-- /.search-input -->
  </div>
  <!-- List menu -->
  <div class="list-group">
    <a href="#" class="list-group-item active">Категорія№</a>
    <a href="#" class="list-group-item">Категорія№</a>
    <a href="#" class="list-group-item">Категорія№</a>
    <a href="#" class="list-group-item">Категорія№</a>
    <a href="#" class="list-group-item">Категорія№</a>
  </div>
  <!-- /List menu -->
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
          <p>{{ substr($book->body, 0, 240) }}{{ strlen($book->body) > 240 ? "...": "" }}</p>
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


</div> <!-- /.row -->
@endsection
