@extends('layouts.app')
@section('title','hive vpn')
@section('content')
<div class="header__section d-flex justify-content-center align-items-center flex-column">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                
                <h1 class="my-3 text-light">Obtener cuentas SSH premium y gratis, para accesos a VPN</h1>
                <h3 class="mb-3 text-info">Conexión rápida y acceso a páginas bloqueadas.</h3>
                <button class="btn btn-outline-info header__btn">COMENZAR!!</button>
                
            </div>
            <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
                <img class="header__img" src="{{ asset('images/vpn-network.png') }}" alt="vpn network">
            </div>
        </div>
    </div>
</div>

<section class="section__services">
    <div class="container">
        <h2 class="text-center title-2">Lo que tenemos para tí!!</h2>
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
    <h2></h2>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="bordered-0 d-flex flex-column align-items-center justify-content-center">
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
                <div class="bordered-0 d-flex flex-column align-items-center justify-content-center">
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
                <div class="bordered-0 d-flex flex-column align-items-center justify-content-center">
                    <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-gauge-simple fa-3x text-light"></i>
                    </div>
    
                    <div class="card-body">
                        <h3 class="text-center">Conexión mas rápida</h3>
                        <p class="text-center">Nuestro servidor SSH VPN hace que su velocidad de Internet sea más rápida con un PING muy pequeño para que se sienta cómodo navegando por Internet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="server__content">
    <div class="container">
        <h2 class="text-center">Algunos de nuestros servicios premium</h2>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center">
                <div class="card__server">
                    <div class="card__type-server">
                        <p class="text-center text-dark">WEBSOCKET</p>
                    </div>
                    <div class="card__title">
                        <h2 class="text-center my-2">Estados Unidos</h2>
                    </div>
                    <div class="card__icon">
                        <img src="https://res.cloudinary.com/ddfsqcy12/image/upload/v1644858230/fr_kcvl6w.png" alt="">
                    </div>
                    <div class="card-body text-center">
                        <span class="card__info-c my-3">0 servidores</span>
                        <a class="btn btn-outline-primary" href="">CREAR SERVER</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
                <div class="card__server">
                    <div class="card__type-server">
                        <p class="text-center text-dark">WEBSOCKET</p>
                    </div>
                    <div class="card__title">
                        <h2 class="text-center my-2">Estados Unidos</h2>
                    </div>
                    <div class="card__icon">
                        <img src="https://res.cloudinary.com/ddfsqcy12/image/upload/v1644858230/fr_kcvl6w.png" alt="">
                    </div>
                    <div class="card-body text-center">
                        <span class="card__info-c my-3">2 servidores</span>
                        <a class="btn btn-outline-primary" href="{{ route('accounts') }}">CREAR SERVER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
