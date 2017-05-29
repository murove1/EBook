   @extends('layouts.dashboard')

   @section('title', 'Повідомлення')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
    <div class="row">
     <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Повідомлення</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">Повідомлення</h1>
  </div>
</div><!--/.row-->


<div class="row">
<div class="col-lg-offset-2 col-lg-8">
   <div class="panel panel-default chat">
     <div class="panel-heading">Переглянути повідомлення <span class="badge"> {{ $count = DB::table('messages')->count() }}</span></div>
     <div class="panel-body">

      <ul>

       @foreach($messages as $message)
       <li class="left clearfix">
        <span class="chat-img pull-left">
          <img src="/upload/users/avatar/default.png" alt="Avatar" class="img-circle" width="80" height="80">
        </span>
        <div class="chat-body clearfix">
          <div class="header">
            <strong class="primary-font">Ім'я:</strong> {{ $message->name}} <small class="text-muted">{{ $message->created_at->format('d/m/y H:i')}}</small>
          </div>
          <strong class="primary-font">
            Email:</strong> {{ $message->email}} 
            <p>
              <strong class="primary-font">
                Повідомлення:</strong>
                {{ $message->message}} 
              </p>
            </div>
            <div class="col-xs-offset-8 col-xs-4 col-lg-offset-10 col-lg-2">
              <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button type="submit" style="margin-top: 10px;" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Видалити</button>
              </form>
            </div>
          </li>
          @endforeach

        </ul>
        <div class="col-md-12 text-center">
          {{ $messages->links()}}
        </div>
      </div>
    </div>
  </div><!--/.col-->
</div><!--/.row-->   
</div><!--/.main-->
@endsection