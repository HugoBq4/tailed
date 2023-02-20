@extends('padrao.layout')

@section('titulo')
    Registro de usuário
@endsection

@section('conteudo')
    <div class="container pos-container">
        <div class="card bg-30 border-all-60">
            <div class="pd-container">
                <div class="pd-input-buttons">
                    <ul class="nav nav-pills nav-justified nav-style-2 mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60 active" id="tab-register" data-mdb-toggle="pill"
                               href="{{route('register')}}">Registrar</a>
                        </li>
                    </ul>
                </div>
                <form id="registrar" autocomplete="off">
                    <div class="row pd-input">
                        <div class="col-12 form-default">
                            <input type="text" name="name" id="name" placeholder="nick *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="text" name="email" id="email" placeholder="email *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="password" name="password" id="password" placeholder="senha *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                   placeholder="confirmar senha *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="checkbox" id="politic" name="politic" role="checkbox"><label class="labelCheck"
                                                                                                      for="politic">Declaro
                                que aceito os <a target="_blank" href="{{route('terms')}}">termos de uso</a> e as
                                <a target="_blank" href="{{route('privacity')}}">políticas de privacidade</a>.</label>
                        </div>
                        <div class="col-12 form-default right-button mt-4">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js-custom')
    <script>
        $('#registrar').on('submit', async function (e) {
            e.preventDefault();
            $('#registrar button[type="submit"]').addClass('disabled').html(
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
                url: "{{ route('register-send') }}",
                data: $('#registrar').serialize(),
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    if (result.status === 'success') {
                        $('.form-default input').addClass('is_valid');
                    }
                    if (result.status === 'error') {
                        result.message.forEach(function (value) {
                            for (var nameError in value) {
                                var input = $('[name="' + nameError + '"]');
                                input.addClass('is_invalid');
                                if (value[nameError] != '') {
                                    console.log(value[nameError]);
                                    input.parents('.form-default').prepend(
                                        $('<p>').prop({
                                            innerHTML: value[nameError],
                                            className: 'error'
                                        })
                                    );
                                }
                            }
                        });
                        $('#registrar button[type="submit"]').removeClass('disabled').html('Enviar');
                    }
                }, error: function (e) {
                    $('#registrar button[type="submit"]').removeClass('disabled').html('Enviar');
                }
            });
        });
    </script>
@endsection

