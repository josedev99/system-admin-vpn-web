@extends('panel.layouts.app')
@section('title','Server')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <h3 class="tile-title">Server</h3>
    <table class="table table-striped table-bordered dataTable no-footer table-responsive-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>IP</th>
          <th>Days</th>
          <th>Tipo</th>
          <th>Domain</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($getServerAll as $item)   
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->ip }}</td>
            <td>{{ $item->days }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->domain }}</td>
            <td>
              @if (Auth::user()->id == $item->user_id)    
              <a href="{{ route('server.destroy',$item) }}" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault();
              document.getElementById('delete-form').submit();">Delete</a>
              <a href="{{ route('server.edit',$item) }}" class="btn btn-outline-info btn-sm">Update</a>

              <form id="delete-form" action="{{ route('server.destroy',$item) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        
      </tbody>
    </table>
  </div>
@endsection