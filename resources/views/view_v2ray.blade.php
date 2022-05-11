@extends('layouts.app')
@section('title','Datos SSH')
@section('content')
    <div class="container">
        <h2 class="text-center py-4">v2ray creado!!</h2>
        <a class="btn btn-info btn-sm my-2" href="{{ route('ssh-create',session('server_id')) }}">Regresar</a>
        <div class="col-12 col-sm-12 col-md-4 mx-auto">
            <div class="alert alert-success text-center p-2" style="font-size: 14px;">
                <strong>Success!</strong> Account has been successfully created.
                <hr>
                <ul class="list-unstyled">
                <li class="list-group-item d-flex justify-content-between align-items-center">Tipo: <b>{{ __('v2ray') }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">Host: <b>{{ $resp_data->domain }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">UUID: <b>{{ $rData['uuid'] }}</b></li>
                <li class="list-group-item d-flex justify-content-between align-items-center">v2ray port: <b>443</b></li>
                </ul>
                <b>VMESS</b>
                <textarea id="ssClipboard" class="form-control mb-2" rows="8" style="font-size: 14px;">vmess://{{ $rData['vmess'] }}</textarea>
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