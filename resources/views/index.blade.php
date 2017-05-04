 @extends('layouts.page')

 @section('content')
<!-- Content -->
<div class="col-md-9">
  <div class="row">
    @foreach($books as $book)
    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail">
        <a href="{{ route('book.show', $book->id) }}"><img src="/upload/books/img/{{ $book->book_img }}" alt="{{ $book->title }}"></a>
        <div class="caption">
          <h4><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></h4>
          <p>{{ substr($book->body, 0, 285) }}{{ strlen($book->body) > 285 ? "...": "" }}</p>
      </div>
      <div class="ratings">
          <p class="pull-right"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> {{ $book->views }}</p>
          <p class="pull-right"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 100 </p>
          <p> <span class="glyphicon glyphicon-bookmark"></span> {{ $book->category->name }}</p>
      </div>
  </div>
</div>
@endforeach

</div>
<div class="col-md-12 text-center">
    {{ $books->appends(['search' => $search])->links()}}
</div>
</div>
<!-- /Content -->
@endsection