   @extends('layouts.dashboard')

   @section('content')
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">         
   	<div class="row">
   		<ol class="breadcrumb">
   			<li><a href="{{ url('dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
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
   					<table class="table table-bordered">
   						<thead>
   							<th>Id</th>
   							<th>Ім'я</th>
   							<th>Email</th>
   							<th>Про себе</th>
   							<th>Книги користувача</th>
   							<th>Дата реєстрації</th>
   							<th>Роль користувача</th>
   							<th>Керування користувачем</th>
   						</thead>
   						<tbody>
                        @foreach($users as $user)
                        <tr>
                           <td>{{ $user->id }}</td>
                           <td>Test</td>
                           <td>Test</td>
                           <td>Test</td>
                           <td>Test</td>
                           <td>Test</td>
                           <td>Test</td>
                           <td>Test</td>
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
                  <div class="col-md-12 text-center">
                  
                  </div>
               </div>
            </div>
         </div>
      </div><!--/.row-->   
   </div><!--/.main-->
   @endsection