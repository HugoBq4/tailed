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
    <link rel="stylesheet" href="{{Url('/')}}/assets_padrao/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{Url('/')}}/assets_padrao/css/default.css">
    @yield('css-custom')

</head>
<body>

<div class="loader"></div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content" style="padding: 10vh 10vw">
            <section class="section">
                <div class="section-body">
                    @yield('conteudo')

                    @yield('modais')
                </div>
            </section>
        </div>
    </div>
</div>

{{--<footer class="main-footer">--}}
{{--    <div class="footer-left">--}}
{{--        &copy; {{date('Y')}}--}}
{{--        <div class="bullet"></div>--}}
{{--        Desenvolvido por <a href="#">Hugo</a>--}}
{{--    </div>--}}
{{--    <div class="footer-right">--}}
{{--    </div>--}}
{{--</footer>--}}
<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br><br>

<div class="default-bg blur-trans mh-200 position-absolute w-100" style="background-image: url({{url('/assets_padrao/images/wallpapers/wolf.jpg')}});"></div>
<footer class="py-3 my-4 default-bg position-absolute w-100" >
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{url('/')}}" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="{{route('privacidade')}}" class="nav-link px-2 text-muted">Privacidade</a></li>
    </ul>
    <p class="text-center text-muted">&copy; {{date('Y')}}</p>
</footer>


<!-- Scripts -->
<script src="{{Url('/')}}/assets_padrao/js/bootstrap.min.js"></script>
@yield('js-custom')

</body>

</html>
