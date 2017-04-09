 @extends('layouts.profile')

 @section('content')
 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default user_panel">
      <div class="panel-body">
        <div class="col-md-12">
          <div class="row">
            <table class="table table-responsive table-hover">
              <thead>
                <tr>
                  <th class="text-center">Назва</th>
                  <th class="text-center">Жанр</th>
                  <th class="text-center">Дата додавання</th>
                  <th class="text-center"><span class="glyphicon glyphicon-eye-open"></span> / <span class="glyphicon glyphicon-heart"></span></th>
                  <th class="text-center">Керування</th>
                </tr>
              </thead>
              <tbody>

               @foreach($books as $book)
               <tr>
                 <td class="text-center"> <a href="{{ url('/book', $book->id) }}">{{ $book->title }} </a> </td>
                 <td class="text-center"> {{ $book->category->name }} </td>
                 <td class="text-center"> {{ $book->created_at}} </td>
                 <td class="text-center"> 840/544 </td>
                 <td class="text-center">
                  <a href="{{ route('book.edit', $book->id)}}"> <button class="btn btn-primary btn-sm">Змінити</button></a>

                  <form action="{{ route('book.destroy', $book->id) }}" method="post">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <input class="btn btn-danger btn-sm" type="submit" value="Видалити">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12 text-center">

      </div>
    </div>
  </div>
</div> <!-- /.row -->
</div>
@endsection