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
    <link rel="stylesheet" href="{{Url('/assets_padrao/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{Url('/assets_padrao/bundles/izitoast/dist/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{Url('/assets_padrao/css/defaultV5.css')}}">
    <link rel="stylesheet" href="{{url('/assets_padrao/bundles/bootstrap-icons/font/bootstrap-icons.css')}}">
    @yield('css-custom')

</head>
<body class="d-flex flex-column min-vh-100">

<!-- Inicio loader tails-->
<div class="loader"></div>
<!-- Fim loader tails-->

<!-- Início Header tails-->
<header class="navbar navbar-expand-md navbar-dark bg-transparent p-rl-50 w-100">
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
            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="dropdownCategories"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="true">Perfil</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownCategories">
                        <a class="dropdown-item" href="javascript:void(0);">Configurar</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
                        @if(Auth::user()->type_user == '1')
                            <a class="dropdown-item" href="{{route('resetDB')}}">Reset DB</a>
                            <a class="dropdown-item" href="{{route('optimize')}}">Optimize</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link notification {{Auth::user()->hasNotifications() ? 'there' : ''}}"
                       href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                       id="dropdownNotifications">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-danger badge-dot">&nbsp;</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownNotifications">
                        @foreach(Auth::user()->getNotifications() as $notification)
                            <a class="dropdown-item" id="{{$notification->id}}"
                               href="{{$notification->link}}">{{$notification->message}}</a>
                        @endforeach
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{route('register')}}#">Registrar</a>
                </li>
            @endif
        </ul>
    </div>
</header>
<!-- Fim Header tails-->


<!-- Início conteúdo tails-->
<main class="main-wrapper main-wrapper-1">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                @yield('conteudo')
            </div>
        </section>
    </div>
</main>
<!-- Fim conteúdo tails-->

<!-- Modal verificar email -->
<div class="modal fade" id="validateEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="validateEmailForm" class="form-default">
                <div class="modal-header">
                    <h5 class="modal-title" id="validateEmailTitle">Validar email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Enviaremos um email de confirmação para:</span>
                    <br>
                    <br>
                    <input type="text" name="email" id="email" placeholder="email *"
                           value="{{Auth::user()->email ?? ''}}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary send">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fim modal verificar email -->

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

<script>
    $('#validateEmail').on('click', async function () {
        $('#validateEmailModal').modal('show');
    });

    $('#validateEmailForm').on('submit', async function (e) {
        e.preventDefault();
        const form = $(this);
        const button = form.find('button[type="submit"]')
        button.addClass('disabled').html(
            $('<span>').prop({
                innerHTML: '',
                className: 'spinner-border spinner-border-sm',
                style: 'margin: 0 18px;'
            })
        );
        var invaliteInputs = $('.is_invalid');
        invaliteInputs.addClass('is_invalid_back');
        invaliteInputs.removeClass('is_invalid');

        var oldErrors = $('p.error');
        oldErrors.removeClass('error').addClass('back_error');
        setTimeout(function () {
            oldErrors.remove();
        }, 2000);

        await $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('validate-email') }}",
            data: $(this).serialize(),
            type: 'post',
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    $('.form-default input').addClass('is_valid');
                    location.reload();
                }
                if (result.status === 'error') {
                    result.message.forEach(function (value) {
                        for (var nameError in value) {
                            var input = $('[name="' + nameError + '"]');
                            input.addClass('is_invalid');
                            if (value[nameError] !== '') {
                                input.parents('.form-default').prepend(
                                    $('<p>').prop({
                                        innerHTML: value[nameError],
                                        className: 'error'
                                    })
                                );
                            }
                        }
                    });
                    button.removeClass('disabled').html('Enviar');
                }
            }, error: function (e) {
                button.removeClass('disabled').addClass('btn-danger').html('Erro');
            }
        });
    });
</script>

</body>

</html>
