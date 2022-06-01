@extends('panel.layouts.app')
@section('title','Actualizar server')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <form method="POST" action="{{ route('server.update',$getServer) }}">
        @method('PUT')
        @csrf
        @include('panel.server._form')
    <div class="tile-footer">
        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn btn-outline-info" href="{{ route('server.show') }}">Regresar</a>
    </div>
</form>
  </div>
@endsection