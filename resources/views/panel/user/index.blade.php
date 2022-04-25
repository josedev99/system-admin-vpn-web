@extends('panel.layouts.app')
@section('title','Usuarios registrados')
@section('content')
@include('panel.partials.alert')

<script>
  function questionDelete(){
    if(confirm('Estas seguro de eliminarlo?')){
      document.getElementById('delete-form').submit()

    }
  }
</script>

<div class="tile">
    <h3 class="tile-title">Server</h3>
    <table class="table table-striped table-bordered dataTable no-footer table-responsive-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Rol</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($getUsersAll as $item)   
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                @if($item->status == 1)
                    {{ __('Activo') }}
                @else
                    {{ __('Desactivado') }}
                @endif
            </td>
            <td>
                @if($item->rol_id == 1)
                    {{ __('Administrador') }}
                @elseif($item->rol_id == 2)
                    {{ __('Usuario') }}
                @else
                    {{ __('Operador') }}
                @endif

            </td>
            
            <td>
                
              <a href="{{ route('user.show',$item) }}" class="btn btn-outline-info btn-sm">Cuentas</a>
              
              <a href="{{ route('user.edit',$item) }}" class="btn btn-outline-info btn-sm">Update</a>
              
              <div class="my-2">
                <form id="delete-form" action="{{ route('user.destroy',$item) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button onclick="questionDelete()" class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
              </form>
              </div>
            
            </td>
          </tr>
          @endforeach
        
      </tbody>
    </table>
  </div>
@endsection