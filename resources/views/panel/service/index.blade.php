@extends('panel.layouts.app')
@section('title','Servicios')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <h3 class="tile-title">Server</h3>
    <table class="table table-striped table-bordered dataTable no-footer table-responsive-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Protocolo</th>
          <th>Pais</th>
          <th>Bandera</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($getServices as $item)   
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->protocol }}</td>
            <td>{{ $item->country }}</td>
            <td>
                <img src="{{ asset('storage/'.$item->flag) }}" height="30" alt="">
            </td>
            <td>
                
              <a href="{{ route('service.edit',$item) }}" class="btn btn-outline-info btn-sm">Update</a>

              <form id="delete-form" action="{{ route('service.destroy',$item) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
              
            </td>
          </tr>
          @endforeach
        
      </tbody>
    </table>
  </div>
@endsection