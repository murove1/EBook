 @extends('layouts.profile')

 @section('content')
 <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default default_panel">
      <div class="panel-body">
        <div class="col-md-12">
          <div class="row">
            <table id="TablemyBooks" class="table table-responsive table-hover">
              <thead>
                <tr>
                  <th>Назва</th>
                  <th>Жанр</th>
                  <th class="hidden-xs">Дата додавання</th>
                  <th class="hidden-xs">
                    <span class="glyphicon glyphicon-eye-open"></span> / 
                    <span class="glyphicon glyphicon-heart"></span>
                  </th>
                  <th>Керування</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <div class="col-md-12 text-center">

        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div>
<script>
  $(document).ready(function() {
    $('#TablemyBooks').DataTable( {
      "lengthChange": false,
      "ajax": "{{ route('getmybooks') }}",
      "columns": [
      {data: 'title', name: 'title'},
      {data: 'category', name: 'category'},
      {data: 'created_at', name: 'created_at'},
      {data: 'rate', name: 'rate'},
      {data: 'action', name: 'action',"orderable": false}
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