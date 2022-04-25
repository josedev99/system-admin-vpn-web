@extends('panel.layouts.app')
@section('title','Agregar servicio')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
        @csrf
        @include('panel.service._form')
    <div class="tile-footer">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
  </div>
@endsection