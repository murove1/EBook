 @extends('layouts.profile')

 @section('content')
 <div class="row">
   <!-- Panel -->
   <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default default_panel">
     <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span><strong> Змінити інформацію в профілі {{Auth::user()->name }}</strong></div>
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

      <form class="form-horizontal" role="form" method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        <input type='hidden' name='_method' value='PUT'>
        {{ csrf_field() }}
        <div class="form-group">
         <div class="col-md-12">
           <label class="control-label" for="name">Ім'я</label>
           <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
         </div>
       </div>
       <div class="form-group">
         <div class="col-md-12">
           <label class="control-label" for="email">Е-мейл</label>
           <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
         </div>
       </div>
       <div class="form-group">  
        <div class="col-md-12">
          <label class="control-label">Про себе:</label>
          <textarea name="bio" style="resize:none;" class="form-control" rows="4">{{ Auth::user()->bio }}</textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
          <label for="avatar">Аватар</label>
          <input type="file" name="avatar">
          <p class="help-block">Виберіть зображення для оновлення аватару.</p>
        </div>
      </div> 
      <div class="form-group">
        <div class="col-md-12">
          <button class="btn btn-success" type="submit"> Змінити</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- /Panel -->
</div> <!-- /.row -->
@endsection