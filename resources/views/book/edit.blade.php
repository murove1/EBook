   @extends('layouts.profile')

    @section('title', 'Змінити дані | '.$book->title.' ')

   @section('content')
   <div class="row">
     <!-- Panel -->
     <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
      <div class="panel panel-default default_panel">
       <div class="panel-heading"><strong>Змінити дані книги</strong></div>
       <div class="panel-body">

         <!-- Errors -->
         @if (count($errors) > 0)
         <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <!-- /Errors -->

        <!-- Form -->
        <form class="form-horizontal" role="form" method="post" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
        <input type='hidden' name='_method' value='PUT'>
        {{ csrf_field() }}
          <div class="form-group">
           <div class="col-md-12">
             <label class="control-label" for="title">Назва</label>
             <input type="text" name="title" class="form-control" placeholder="Назва книги" value="{{ $book->title }}" required>
           </div>
         </div>
         <div class="form-group">
           <div class="col-md-12">
             <label class="control-label" for="author">Автор</label>
             <input type="text" name="author" class="form-control" placeholder="Автор" value="{{ $book->author }}" required>
           </div>
         </div>
         <div class="form-group">
           <div class="col-md-12">
             <label class="control-label" for="year">Рік видання</label>
             <input type="text" name="year" class="form-control" placeholder="Рік видання" value="{{ $book->year }}" required>
           </div>
         </div>
         <div class="form-group">
           <div class="col-md-12">
             <label class="control-label" for="page">Сторінки</label>
             <input type="text" name="page" class="form-control" placeholder="Сторінки" value="{{ $book->page }}" required>
           </div>
         </div>
         <div class="form-group">
           <div class="col-md-12">
            <label class="control-label">Жанр</label>
            <select class="form-control" name="category_id">
              
              @foreach($categories as $category)
              <option {{ $category->id === $book->category_id ? 'selected' : '' }} value='{{ $category->id }}'>{{ $category->name }}</option>
              @endforeach
              

            </select>
          </div>
        </div>
        <div class="form-group">  
          <div class="col-md-12">
            <label class="control-label">Опис</label>
            <textarea name="body" style="resize:none;" class="form-control" rows="5"  required>{{ $book->body }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="book_img">Завантажити зображення книги</label>
            <input type="file" name="book_img">
            <p class="help-block">Виберіть зображення для завантаження.</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="book_file">Завантажити книгу</label>
            <input type="file" name="book_file">
            <p class="help-block">Виберіть книгу формату PDF,DOC,DOCX для завантаження.</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <button class="btn btn-success" type="submit"> Змінити</button>
          </div>
        </div>
      </form>
      <!-- /Form -->
    </div>
  </div>
</div>
<!-- /Panel -->
</div> <!-- /.row -->
@endsection