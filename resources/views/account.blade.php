@extends('layouts.app')
@section('content')
    <div class="banner__server">
        <div class="header__section-transparent d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-center py-3 title-1 text-light">SSH WebSocket VIP/FREE</h1>
            <h3 class="text-success">Lista de servidores</h3>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            @foreach ($data as $item)
            
            <div class="col-12 col-sm-12 col-md-3 mb-5">
                <div class="card card-link">
                <div class="card-body p-2">
                <h6 class="text-center">SSH SSL/TLS @if ($item->type == "premium") <span class="badge__vip">vip</span> @else <span class="badge__free">free</span> @endif</h6><hr>
                <h4 class="text-center">{{ $item->name }}</h4>
                <table class="text-left col-lg-12 col-12 small">
                <tbody><tr><td>Domain</td><td>: <b>{{ $item->domain }}</b></td></tr>
                    <tr><td>IP</td><td>: <b>{{ $item->ip }}</b></td></tr>
                <tr><td>Location</td><td>: <span class="flag-icon flag-icon-ca"></span> <b>{{ $item->province }}</b></td></tr>
                <tr><td>Valido</td><td>: <b>{{ $item->days }} días</b></td></tr>
                <tr><td>OpenSSH</td><td>: <b>22</b></td></tr>
                <tr><td>Dropbear+SSL</td><td>: <b>443</b></td></tr>
                <tr><td>SSH WebSocket</td><td>: <b>80</b></td></tr>
                </tbody></table>
                <hr>
                <div class="d-flex justify-content-between">
                    <p class="card-text small">Conexiones: <i class="badge badge-success"><b>{{ $item->limit }}</b></i> </p>
                    <h5 class="text-dark">$@if ( $item->type == "premium" ) {{ $item->price }} @else 0.00 @endif
                    </h5>
                </div>
                </div>
                <div class="card-footer bg-transparent pt-0 pb-3">
                <a class="d-block btn btn-primary btn-block mt-2 rounded-pill" href="{{ route('ssh-create',$item) }}">CREAR</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection