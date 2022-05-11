@extends('layouts.app')

@section('content')
    @if ($server[0]->protocol == "websocket" || $server[0]->protocol == "WEBSOCKET" || $server[0]->protocol == "WebSocket")
        @include('websocket')
    @elseif($server[0]->protocol == "v2ray" || $server[0]->protocol == "V2RAY")
        @include('v2ray')
    @endif

    <div style="background: #f2f5f7" class="py-2">
        <div class="container my-2">
            <h4 class="text-center my-4"> ¿SOBRE HIVE VPN? </h4>
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title text-uppercase text-muted mb-2 h5">VELOCIDAD MÁS RÁPIDA</h2>
                                    <p class="small font-weight-bold mb-2">hive-vpn.tk le ofrece el mejor servidor. Sentirás una nueva experiencia que no encontrarás en ningún otro lugar.
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title text-uppercase text-muted mb-2 h5">Gratis y Premium</h2>
                                    <p class="small font-weight-bold mb-2">hive-vpn.tk ofrece servidores gratis y premium, este ultimo ofrece soporte 24 horas.
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h2 class="card-title text-uppercase text-muted mb-2 h5">Con amor</h2>
                                    <p class="small font-weight-bold mb-2">hive-vpn.tk es administrado por nuestro equipo que constantemente fomenta el mantenimiento del servicio.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-2">Seguridad SSL/TLS</h5>
                                    <p class="small font-weight-bold mb-2">hive-vpn.tk no usa ningún registro para monitorear su actividad. Podemos garantizar que se mantenga la seguridad de sus datos.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const formData = document.getElementById('form')
        const user = document.getElementById('user');
        const passwd = document.getElementById('passwd');
        addEventListener('submit', (e)=>{
            
            if(/\s/.test(user.value) || /\s/.test(passwd.value)){
                e.preventDefault();
                swal('Error','No puede contener espacios','error');
                return 0;
            }
        })
       
       
   </script>
@endsection