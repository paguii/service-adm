<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iService Adm - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iService.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_resources/normalize-css/normalize.css') }}" rel="stylesheet">
    
    <!-- Scripts  -->
    <script src="{{ asset('bower_resources/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body class="@yield('bodyClass')">

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <img class="img-responsive" src="{{ asset('images/iService-sm.png') }}" alt="">
            </div>
            <div class="col-md-9">
                <h2>@yield('tituloRelatorio')</h2>
            </div>
            <div class="col-md-1">
                <h4><a href="{{route('listarRelatorios')}}">Voltar</a></h4>
            </div>
        </div>
        <hr>
    </div>
</header>

<div class="container-fluid">
    @yield('conteudo')
</div>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <hr>
                @yield('rodape')
            </div>
        </div>
    </div>
</footer>

</body>
</html>