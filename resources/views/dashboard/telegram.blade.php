   @extends('layouts.dashboard')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
    <div class="row">
     <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Telegram Бот</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">Telegram Бот</h1>
  </div>
</div><!--/.row-->


<div class="row">
 <div class="col-lg-12">
  <div class="panel panel-default">
   <div class="panel-heading">Відправити повідомлення в канал Telegram</div>
   <div class="panel-body">
    <div class="col-md-offset-3 col-md-6">
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
  </div>
  <!-- /Errors -->
  <div class="col-md-offset-3 col-md-6">
    <form role="form" method="post" action="{{ route('admin.telegram.store')}}">
      {{ csrf_field() }}

      @if(Session::has('success'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
      @endif

      <div class="form-group">
        <label>Текст повідомлення</label>
        <textarea name="text" class="form-control" style="resize:none;" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Відправити</button>
    </form>
  </div>
</div>
</div>
</div>
</div><!--/.row-->   
</div><!--/.main-->
@endsection