@extends('layouts.app')

<!---MODAL---->
@include('partials.modal')

@section('title','hive vpn')
@section('content')
<div class="header__section d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 header__content">
                
                <h1 class="my-3 title-1"><img src="https://img.icons8.com/color/48/null/individual-server.png"/> Obtener cuentas <span>SSH premium y gratis </span>, para accesos a VPN</h1>
                <h3 class="mb-3 text-description"><img src="https://img.icons8.com/windows/32/null/slow-download.png"/>Conexión rápida y acceso a páginas bloqueadas.</h3>
                <a href="{{ route('service.all') }}" class="btn btn-outline-info header__btn mt-3"><img src="https://img.icons8.com/material/24/null/server-linux.png"/> COMENZAR!!</a>
                
            </div>
            <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center header__img">
                <img class="header__img" src="{{ asset('images/phone-test.png') }}" alt="vpn network">
            </div>
        </div>
    </div>
</div>

<section class="section__services">
    <div class="container">
        <h2 class="text-center title-2 mb-2">Lo que tenemos para tí!!</h2>
        <p class="text-dark services__info pb-4">Nos enfocamos en traer los mejores servicios para las siguientes cuentas!!!</p>
            <div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center align-items-center">
                <div class="services__icon">
                    <img src="{{ asset('images/ssh.svg') }}" alt="">
                </div>
                <div class="services__icon">
                    <img src="{{ asset('images/v2ray.svg') }}" alt="">
                </div>
            </div>
    </div>
</section>

<section class="section__information">

    <div class="container">
        <h2 class="text-center title-2 mb-4 pb-3">Funciones que te brindamos!!</h2>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="bordered-0 information__card d-flex flex-column align-items-center justify-content-center">
                    <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="far fa-user fa-3x text-light"></i>
                    </div>
    
                    <div class="card-body">
                        <h3 class="text-center">Cuentas personales</h3>
                        <p class="text-center">Crea tus cuentas SSH VPN con un nombre de usuario y contraseña como desees.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="bordered-0 information__card d-flex flex-column align-items-center justify-content-center">
                    <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-dollar-sign fa-3x text-light"></i>
                        
                    </div>
    
                    <div class="card-body">
                        <h3 class="text-center">Servidores gratuitos</h3>
                        <p class="text-center">Puede crear cuentas SSH VPN en cualquier momento en este sitio web de forma gratuita.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="bordered-0 information__card d-flex flex-column align-items-center justify-content-center">
                    <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-gauge-simple fa-3x text-light"></i>
                    </div>
    
                    <div class="card-body">
                        <h3 class="text-center">Conexión mas rápida</h3>
                        <p class="text-center">Nuestros servicios hacen que su velocidad de Internet sea más rápida con un PING muy pequeño.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="security">
    <div class="container">
        <div class="security__content">
            <div class="security__info-left">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJdJREFUSEvtk9ENgCAMRB+TOIK6iaPoBDqSo+gGOomGRBIgEiRV4gd8kbS9ttc7xcdPfYxP1gYdMAKNcKsNGIBZ49gb6EAlBDflC9D6DY4rKqXNwbHBUhvY+aG/Q9HvGoTOFaTozSOvRo32DbRMJ6AWKmkH+juZCnHvy6WSjA7lU1ScrCkrTo4Kpzg5SpGTkNXJaaM9zD4BSXUsGU/pTXAAAAAASUVORK5CYII="/>
                <h2 class="title-2 mb-4">Seguridad de conexión</h2>
                
                <p>Nuestro servidor tiene conectividad segura para navegar en internet. Esto hace que el proceso de conexión sea anónimo sin compartir ninguna información privada mientras se conecta con otros dispositivos a través de la conexión a Internet.</p>
            </div>
            <div class="security__img-right">
               <img src="{{ asset('images/icons/vpn-red.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<section class="server__content">
    <div class="container">
        <h2 class="text-center title-2">Prueba nuestros servicios</h2>

        <div class="row justify-content-center">

            @foreach ($getServiceAll as $item)
                
            <div class="col-12 col-sm-12 col-md-4 d-flex justify-content-center my-3">
                <div class="card__server">
                    <div class="card__type-server">
                        <p class="text-center text-dark">{{ $item->protocol }}</p>
                    </div>
                    <div class="card__title">
                        <h2 class="text-center my-2">{{ $item->country }}</h2>
                    </div>
                    <div class="card__icon">
                        <img height="50" src="{{ asset('storage/'.$item->flag) }}" alt="flag">
                    </div>
                    <div class="card-body text-center">
                        <span class="card__info-c my-3">1 servidores</span>
                        <a class="btn btn-outline-primary" href="{{ route('service',[$item->protocol,$item->id]) }}">CREAR SERVER</a>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>
        
    </div>

</section>

<section class="content__number">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-4 d-flex justify-content-center mb-3">
                <div class="cirle__info server">
                    <h3>{{ $getServersAll }}</h3>
                    <h4>SERVER</h4>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 d-flex justify-content-center mb-3">
                <div class="cirle__info server">
                    <h3>{{ $getAccountsAll }}</h3>
                    <h4>ACCOUNTS</h4>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 d-flex justify-content-center">
                <div class="cirle__info server">
                    <h3>{{ $getTotalAccountDay }}</h3>
                    <h4>TODAY</h4>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
