 @extends('layouts.profile')

 @section('content')
 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default user_panel">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
               <img class="img-circle img-responsive" alt="" src="/upload/users/avatar/{{ $user->avatar }}">
             </figure>

             
             @if($user->id == Auth::user()->id)
             <!-- Edit block -->
             <div class="row">
              <div class="edit_caption">
                <a href="{{ route('user.edit', Auth::user()->id)}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Змінити</button></a>
              </div>
            </div>
            <!-- /Edit block -->
            @endif
            
          </div>
          <div class="col-xs-12 col-sm-8">
            <ul class="list-group">
              <li class="list-group-item"><strong>Ім'я:</strong> {{ $user->name }} </li>
              <li class="list-group-item"><strong>E-Мейл:</strong> {{ $user->email }}</li>
              <li class="list-group-item"><strong>Дата реєстрації:</strong> {{ $user->created_at }}</li>
              <li class="list-group-item"><strong>Про себе: </strong> {{ $user->bio }} </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> <!-- /.row -->
@endsection