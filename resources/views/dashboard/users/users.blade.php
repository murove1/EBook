   @extends('layouts.dashboard')

   @section('title', 'Керування користувачами')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
   	<div class="row">
   		<ol class="breadcrumb">
   			<li><a href="{{ route('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
   			<li class="active">Керування користувачами</li>
   		</ol>
   	</div><!--/.row-->

   	<div class="row">
   		<div class="col-lg-12">
   			<h1 class="page-header">Користувачі</h1>
   		</div>
   	</div><!--/.row-->
   	<div class="row">
   		<div class="col-lg-12">
   			<div class="panel panel-default">
   				<div class="panel-heading">Керування користувачами</div>
   				<div class="panel-body">
   					<table id="TableUsers" class="table table-bordered" style="width: 100%">
   						<thead>
                        <tr>
                         <th>Id</th>
                         <th>Ім'я</th>
                         <th>Email</th>
                         <th>Про себе</th>
                         <th>Книги користувача</th>
                         <th>Роль користувача</th>
                         <th>Дата реєстрації</th>
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
    $('#TableUsers').DataTable( {
      "lengthChange": false,
      "scrollX": true,
      "ajax": "{{ route('getusers') }}",
      "columns": [
      {data: 'id', name: 'id'},
      {data: 'name', name: 'name'},
      {data: 'email', name: 'email'},
      {data: 'bio', name: 'bio'},
      {data: 'books', name: 'books'},
      {data: 'roles', name: 'roles'},
      {data: 'created_at', name: 'created_at'},
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