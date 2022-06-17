@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            @if (count($getUsersAll) > 0)
            <table class="table table-hover table-bordered" id="table-allUser">
                <thead>
                  <tr role="row"><th>User</th><th>Passwd</th>
                    <th">Tipo</th>
                    <th>Creado</th>
                    <th>Expire</th>
                    <th>Dominio</th>
                    <th>ID Usuario</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($getUsersAll as $item)    
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ $item->user }}</td>
                        <td>{{ $item->passwd }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->created }}</td>
                        <td>{{ $item->expire }}</td>
                        <td>{{ $item->domain }}</td>
                        <td>{{ $item->user_id }}</td>
                      </tr></tbody>
                    @endforeach  
              </table>
            @else
              <h4>¡No hay usuario creados!</h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    //USE DATATABLES  
    var tableServer = new DataTable("#table-allUser");
  </script>
@endsection
