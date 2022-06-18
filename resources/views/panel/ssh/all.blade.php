@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
            <table class="table table-hover table-bordered table-responsive-sm" id="table-allUser">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Passwd</th>
                    <th>Tipo</th>
                    <th>Creado</th>
                    <th>Expire</th>
                    <th>Dominio</th>
                    <th>ID Usuario</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($getUsersAll as $item)    
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->user }}</td>
                      <td>{{ $item->passwd }}</td>
                      <td>{{ $item->type }}</td>
                      <td>{{ $item->created }}</td>
                      <td>{{ $item->expire }}</td>
                      <td>{{ $item->domain }}</td>
                      <td>{{ $item->user_id }}</td>
                    </tr>
                    @endforeach  
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    //USE DATATABLES  
    var tableServer = new DataTable("#table-allUser");
  </script>
@endsection
