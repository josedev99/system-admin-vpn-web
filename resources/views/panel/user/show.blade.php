@extends('panel.layouts.app')
@section('title','Usuarios registrados')
@section('content')
@include('panel.partials.alert')

<div class="tile">
    <div class="my-3">
        <a class="btn btn-outline-info btn-sm" href="{{ route('user.index') }}"> Regresar</a>
    </div>
    @forelse ($getUsersAccounts as $item)
        
    <div class="list-group mb-2">
        <button type="button" class="list-group-item list-group-item-action active">
          {{ $item->name }}
        </button>
        <button type="button" class="list-group-item list-group-item-action">{{ $item->user }} | {{ $item->passwd }} | {{ $item->created }} | {{ $item->expire }}</button>
      </div>
      @empty
      
      @endforelse
    
</div>
@endsection
