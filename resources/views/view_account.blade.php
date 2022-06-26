@extends('layouts.app')
@section('title','Datos SSH')
@section('content')
    <div class="container">
        <h2 class="text-center py-4">SSH + WebSocket Creado</h2>
        <a class="btn btn-info btn-sm my-2" href="{{ route('create-server',session('server_id')) }}">Regresar</a>
        <div class="col-12 col-sm-12 col-md-4 mx-auto">
            <div class="alert alert-success text-center p-2" style="font-size: 14px;">
                <strong>Success!</strong> Account has been successfully created.
                <hr>
                <ul class="list-unstyled">
                <li class="list-group-item d-flex justify-content-between align-items-center">Tipo: <b>{{ $resp_data->type }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Host: <b>{{ $resp_data->domain }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">IP: <b>{{ $resp_data->ip }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Username: <b>{{ $resp_data->user }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Password: <b>{{ $resp_data->passwd }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Created: <b>{{ $resp_data->created }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Expired: <b>{{ $resp_data->expire }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">SSH SSL/TLS Port: <b>443</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">SSH WebSocket: <b>80</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">UDPGW Port: <b>7300</b></li>
                
                </ul>
                <b>Payload</b>
                <textarea id="ssClipboard" class="form-control mb-2" rows="3" style="font-size: 14px;">{{ $resp_data->payload }}</textarea>
                <button class="d-block btn btn-success btn-block rounded-pill" onclick="copyClipboard()">Copy</button>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
                <script src="https://sshocean.com/assets/js/jquery.qrcode.js" type="text/javascript"></script>
                <script src="https://sshocean.com/assets/js/qrcode.js" type="text/javascript"></script>
                <script type="text/javascript">
                      function copyClipboard() {
                       var copyText = document.getElementById("ssClipboard");
                       copyText.select();
                       document.execCommand("copy");
                       alert("Copiado al portapapeles");
                      }
                </script><br>
            </div>
        </div>
    </div>
@endsection