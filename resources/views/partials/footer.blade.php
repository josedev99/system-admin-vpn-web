<footer class="footer__content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 mb-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/icons/logo.jpeg') }}" height="25" alt="">
                </a>
                <p class="footer__text">Somos los mejores proveedores de cuentas SSH para tus VPN, con acceso a videojuegos y mucho más</p>
                <div class="footer__redes d-flex justify-content-start align-items-center">
                    <b class="mr-3 footer__text">Mi telegram personal:</b> <a href="#"><i class="fa-brands fa-telegram fa-3x"></i></a>
                </div>
               
            </div>
            <div class="col-12 col-sm-12 col-md-4 mb-4">
                <h3 class=" footer__title">Estadisticas e información</h3>
                <p class="footer__text m-0">Cuentas totales: 100k</p>
                <p class="footer__text">Registrados: 300</p>
                
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <h3 class=" footer__title">Otros servicios</h3>
                <ul class="footer__list m-0 p-0">
                    <li><i class="fa-solid fa-arrow-up-right-from-square"></i><a href="{{ route('register') }}">Registrarse</a></li> 
                    <li><i class="fa-solid fa-arrow-up-right-from-square"></i><a href="{{ route('termino') }}">Politicas</a></li>
                    <li><i class="fa-solid fa-arrow-up-right-from-square"></i><a href="{{ route('panel') }}">Admninistración</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <h5 class="footer__bottom-dev">© 2022 All Rights Reserved - hirvip vpn</h5>
    </div>
</footer>