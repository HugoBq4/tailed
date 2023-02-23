@extends('padrao.layout')

@section('titulo', 'Login')

@section('conteudo')
    <div class="container pos-container">
        <div class="card bg-30 border-all-60">
            <div class="pd-container">
                <div class="pd-input-buttons">
                    <ul class="nav nav-pills nav-justified nav-style-2 mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60 active" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60" id="tab-register" data-mdb-toggle="pill"
                               href="{{route('register')}}">Registrar</a>
                        </li>
                    </ul>
                </div>
                <form id="login" autocomplete="off">
                    <div class="row pd-input">
                        <div class="col-12 form-default">
                            <input type="text" name="login" id="login" placeholder="usuario ou email" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="password" name="password" id="password" placeholder="senha" value="">
                        </div>
                        <div class="col-12 form-default right-button mt-4">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js-custom')

    <script src="{{url('/assets_padrao/js/gsap.min.js')}}"></script>
    <script src="{{url('/assets_padrao/js/Draggable.min.js')}}"></script>
    <script src="{{url('/assets_padrao/js/solar-picker.js')}}"></script>

    <script>
        $('#login').on('submit', async function (e) {
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
                url: "{{ route('login-submit') }}",
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
@endsection

