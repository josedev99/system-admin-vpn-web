@extends('panel.layouts.app')
@section('title','Add server')
@section('content')
<div class="tile">
  <form method="POST" action="{{ route('updateSSH',request()->ip) }}">
      @csrf
      @include('panel.ssh._form')
  <div class="tile-footer">
      <button class="btn btn-primary" type="submit">Renovar</button>
      <a class="btn btn-outline-info" href="{{ route('sshPremium') }}">Cancelar</a>
  </div>
</form>
</div>
@endsection
