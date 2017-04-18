   @extends('layouts.dashboard')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
    <div class="row">
     <ol class="breadcrumb">
      <li><a href="{{ url('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Керування книги</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">Книги</h1>
  </div>
</div><!--/.row-->


<div class="row">
 <div class="col-lg-12">
  <div class="panel panel-default">
   <div class="panel-heading">Керування книгами</div>
   <div class="panel-body">
     <div class="row">
       <div class="col-md-3">BUTTON</div>
       <div class="col-md-6"></div>
       <div class="col-md-3">SEARCH</div>
     </div>
     <table class="table table-bordered">
      <thead>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
        <th>Test</th>
      </thead>
      <tbody>

        @foreach($books as $book)
        <tr>
          <td>{{ $book->id  }}</td>
          <td>{{ $book->title  }}</td>
          <td>Test</td>
          <td>Test</td>
          <td>Test</td>
          <td>Test</td>
          <td>Test</td>
          <td>Test</td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <div class="col-md-12 text-center">
      {{ $books->links()}}
    </div>
  </div>
</div>
</div>
</div><!--/.row-->   
</div><!--/.main-->
@endsection