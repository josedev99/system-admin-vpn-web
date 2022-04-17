@extends('panel.layouts.app')
@section('title','Usuarios registrados')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <form method="POST" action="{{ route('user.update',$user) }}">
        @method('PUT')
        @csrf
        @include('panel.user._form')
        <div class="tile-footer">
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-outline-info" href="{{ route('user.index') }}">Regresar</a>
        </div>
    </form>
  </div>
@endsection