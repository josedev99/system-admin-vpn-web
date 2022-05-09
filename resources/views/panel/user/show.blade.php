@extends('panel.layouts.app')
@section('title','Usuarios registrados')
@section('content')
@include('panel.partials.alert')

<div class="tile">
    <div class="my-3">
        <a class="btn btn-outline-info btn-sm" href="{{ route('user.index') }}"> Regresar</a>
    </div>
    @forelse ($getUsersAccounts as $item)
    <ul class="list-unstyled">
      <li class="list-group-item d-flex justify-content-between align-items-center">User SSH: <b>{{ $item->user }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">passwd SSH: <b>{{ $item->passwd }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Fecha creado: <b>{{ $item->created }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Fecha de exp: <b>{{ $item->expire }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Pais: <b>{{ $item->country }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">server: <b>{{ $item->name }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Dominio: <b>{{ $item->domain }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Dias: <b>{{ $item->days }}</b></li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Precio: <b>{{ $item->price }}</b></li>
    </ul>
    
      @empty
      
      @endforelse
    
</div>
@endsection
