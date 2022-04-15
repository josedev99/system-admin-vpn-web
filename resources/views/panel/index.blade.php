@extends('panel.layouts.app')

@section('title','Home')

@section('content')
<div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Usuarios</h4>
          <p><b>{{ $numUser }}</b></p>
        </div>
      </div>
    </div>
</div>
@endsection