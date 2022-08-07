@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
@include('panel.partials.alert')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div>
            @if (count($getSSHPremium) > 0)
            <table class="table table-hover table-bordered no-footer table-responsive-sm" id="table-userAuth">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Passwd</th>
                    <th>IP</th>
                    <th>Creado</th>
                    <th>Expire</th>
                    <th>Dominio</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($getSSHPremium as $item)
                    @if ($item->type == "premium")
                        
                    <tr>
                      <td>{{ $item->user }}</td>
                      <td>{{ $item->passwd }}</td>
                      <td>{{ $item->ip }}</td>
                      <td>{{ $item->created }}</td>
                      <td>{{ $item->expire }}</td>
                      <td>{{ $item->domain }}</td>
                      <td><a class="btn btn-outline-success btn-sm" href="{{ route('renovarSSH',['ip' => $item->ip,'user' =>$item->user]) }}">Renovar</a></td>
                    </tr>
                    @endif    
                      @endforeach  
                    </tbody>
              </table>
              
            @else
              <h4>¡No hay usuarios creados!</h4>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    //USE DATATABLES  
    var tableServer = new DataTable("#table-userAuth");
  </script>
@endsection
