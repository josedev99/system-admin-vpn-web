@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
<div class="tile">
    <form method="POST" action="{{ route('saveServer') }}">
        @csrf
        @include('panel.server._form')
    <div class="tile-footer">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
  </div>
@endsection