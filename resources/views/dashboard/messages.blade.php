   @extends('layouts.dashboard')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
      <div class="row">
         <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Повідомлення</li>
         </ol>
      </div><!--/.row-->
      
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Повідомлення</h1>
         </div>
      </div><!--/.row-->

      
      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading">Переглянути повідомлення</div>
               <div class="panel-body">
               <!-- content -->
           </div>
        </div>
     </div>
  </div><!--/.row-->   
</div><!--/.main-->
@endsection