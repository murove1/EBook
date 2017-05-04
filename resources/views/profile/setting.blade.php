   @extends('layouts.profile')

   @section('content')
   <div class="row">
     <!-- Panel -->
     <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
      <div class="panel panel-default default_panel">
       <div class="panel-heading"><strong>Змінити пароль</strong></div>
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
        <form class="form-horizontal" role="form" method="post" action="{{ route('password.update')}}">
        
          {{ csrf_field() }}

          @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
          </div>
          @endif

          <div class="form-group">
           <div class="col-md-12">
             <input type="password" name="password" class="form-control" placeholder="Пароль" required>
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