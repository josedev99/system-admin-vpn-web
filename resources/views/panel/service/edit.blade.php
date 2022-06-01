@extends('panel.layouts.app')
@section('title','Update service')
@section('content')
@include('panel.partials.alert')
<div class="tile">
    <form method="POST" action="{{ route('service.update',$service) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('panel.service._form')
    <div class="tile-footer">
        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn btn-outline-info" href="{{ route('service.index') }}">Regresar</a>
    </div>
</form>
  </div>
@endsection