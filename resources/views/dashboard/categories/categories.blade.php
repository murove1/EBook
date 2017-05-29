   @extends('layouts.dashboard')

   @section('title', 'Керування категоріями')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
   	<div class="row">
   		<ol class="breadcrumb">
   			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
   			<li class="active">Керування категоріями</li>
   		</ol>
   	</div><!--/.row-->

   	<div class="row">
   		<div class="col-lg-12">
   			<h1 class="page-header">Категорії</h1>
   		</div>
   	</div><!--/.row-->


   	<div class="row">
   		<div class="col-lg-12">
   			<div class="panel panel-default">
   				<div class="panel-heading">Керування категоріями</div>
   				<div class="panel-body">
            <div class="col-md-6">
              <a href="{{ route('admin.category.create')}}"> 
               <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Додати</button>
             </a>
           </div>
           <table id="TableCategories" class="table table-bordered" style="width: 100%">
             <thead>
              <tr>
               <th>Id</th>
               <th>Назва</th>
               <th>Створено</th>
               <th>Змінено</th>
               <th>Керування</th>
             </tr>
           </thead>
         </table>
       </div>
     </div>
   </div>
 </div><!--/.row-->   
</div><!--/.main-->
<script>
  $(document).ready(function() {
   $('#TableCategories').DataTable( {
    "lengthChange": false,
    "scrollX": true,
    "ajax": "{{ route('getcategories') }}",
    "columns": [
    {data: 'id', name: 'id'},
    {data: 'name', name: 'name'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
    {data: 'action', name: 'action', "orderable": false}
    ],
    "language": {
      "lengthMenu": "Показати _MENU_ записів на сторінці",
      "zeroRecords": "Запитів не знайдено",
      "info": "Показано сторінку _PAGE_ з _PAGES_",
      "search": "Пошук:",
      "paginate": {
        "previous": "Попередня",
        "next": "Наступна"
      }
    }
  } );
 } );
</script>
@endsection