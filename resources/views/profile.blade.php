 @extends('layouts.page')

 @section('content')
 <!-- Container -->
 <div class="container">
  <div class="row">
   <!-- Panel -->
   <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
                <img class="img-circle img-responsive" alt="" src="/img/avatar/{{ $user->avatar }}">
              </figure>
            </div>
            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item">{{ $user->name }}</li>
                <li class="list-group-item">{{ $user->email }}</li>
                <li class="list-group-item">{{ $user->created_at }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Panel -->
</div> <!-- /.row -->
</div> 
<!-- /Container -->
@endsection
