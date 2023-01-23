<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! htmlScriptTagJsApi(['lang' => 'es']) !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--FONTAWESOME --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---SWAL--->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <!------ICON TELEGRAM FLOAT----->
    <div class="telegram">
        <a target="_blank" href="https://t.me/+Mg2mVoluJ_0xMTlh"><img src="{{ asset('images/telegram.svg') }}" width="65" alt=""></a>
    </div>
    <div id="app">
        @include('partials.navbar')

        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
</html>
