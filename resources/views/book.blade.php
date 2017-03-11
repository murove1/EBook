   @extends('layouts.page')

   @section('content')
   <div class="row">

    <!-- Menu -->
    <div class="col-md-3">

     <div class="panel panel-default">
      <div class="panel-heading text-center">Меню</div>
      <div class="panel-body">
       <div class="input-group">
        <input type="text" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <!-- /.search-input -->
    </div>
    <!-- List menu -->
    <div class="list-group">
      <a href="#" class="list-group-item active">Категорія№</a>
      <a href="#" class="list-group-item">Категорія№</a>
      <a href="#" class="list-group-item">Категорія№</a>
      <a href="#" class="list-group-item">Категорія№</a>
      <a href="#" class="list-group-item">Категорія№</a>
    </div>
    <!-- /List menu -->
  </div>
</div> 
<!-- /Menu --> 

<!-- Content -->
<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <div class="book-box">
           <img class="img-thumbnail" src="http://progbook.ru/images/covers/nyuman-osvoy-samostoyatelno-php-10-minut-na-urok.jpg" alt="">
           <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Читати</button>
           <button type="button" class="btn btn-success"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
         </div>
       </div>
       <div class="col-md-9">
         <div class="book-caption">
           <h4>Книга ТестТест</h4>
           <div class="book-ratings">
            <p class="pull-right"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 1225 </p>
            <p class="pull-right"> <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 100 </p>
            <p class="category">Категорія#</p>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum temporibus id, nemo nostrum provident itaque voluptate facilis totam pariatur consectetur sunt debitis at, iste, rerum libero atque praesentium cum vitae.</p>

          <h2 style="text-align:center;">Social repost</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Comment -->
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <h1 style="text-align:center;">COmment</h1>
    </div>
  </div>
</div>
<!-- /Comment -->

</div>
<!-- /Content -->

</div> <!-- /.row -->
@endsection