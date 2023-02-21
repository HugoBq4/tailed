<?php $controller = new \App\Http\Controllers\Padrao\LayoutController(); ?>
    <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--    <link rel="shortcut icon" href="{{Url('/')}}/assets_admin/img/logo-defesa.ico"/>--}}
    <title>@yield('titulo')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{Url('/assets_padrao/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{Url('/assets_padrao/bundles/izitoast/dist/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{Url('/assets_padrao/css/defaultV3.css')}}">
    @yield('css-custom')

</head>
<body class="d-flex flex-column min-vh-100">

<!-- Inicio loader tails-->
<div class="loader"></div>
<!-- Fim loader tails-->

<!-- Início Header tails-->
<nav class="navbar navbar-expand-md navbar-dark bg-transparent p-rl-50">
    <a class="navbar-brand" style="margin:20px 75px 20px 20px;" href="{{url('/')}}">
        <?php $resolucaoLogo = '50px'; ?>
        @include('padrao.svg')
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Quentes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Comunidade</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownCategories" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="true">Categorias</a>
                <div class="dropdown-menu" aria-labelledby="dropdownCategories">
                    @foreach($controller->categories as $c)
                        <a class="dropdown-item" href="{{$c->getLink()}}">{{$c->value}}</a>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- Fim Header tails-->


<!-- Início conteúdo tails-->
<div class="main-wrapper main-wrapper-1">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                @yield('conteudo')
            </div>
        </section>
    </div>
</div>
<!-- Fim conteúdo tails-->

@yield('modais')

<!-- Início footer tails-->
<footer class="py-3 my-4 default-bg footer w-100">
    <div class="default-bg blur-trans position-absolute footer-img w-100 h-100"
         style="background-image: url({{url('/assets_padrao/images/wallpapers/wolf.jpg')}});"></div>
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{url('/')}}" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="{{route('privacity')}}" class="nav-link px-2 text-muted">Privacidade</a></li>
    </ul>
    <p class="text-center text-muted">&copy; {{date('Y')}}</p>
</footer>
<!-- Fim footer tails-->


<!-- Scripts tails -->
<script src="{{Url('/assets_padrao/js/jquery.min.js')}}"></script>
<script src="{{Url('/assets_padrao/js/bootstrap.min.js')}}"></script>
<script src="{{Url('/assets_padrao/bundles/izitoast/dist/js/iziToast.min.js')}}"></script>
<script src="{{Url('/assets_padrao/js/jquery.validate.js')}}"></script>
<script src="{{Url('/assets_padrao/js/validationsv1.js')}}"></script>
@yield('js-custom')

</body>

</html>
