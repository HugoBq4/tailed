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
                <form id="registrar">
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
                            <input type="password" id="confirmpPassword" placeholder="confirmar senha *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="checkbox" id="termos" role="checkbox" name="termos"><label class="labelCheck" for="termos">Declaro
                                que aceito os <a target="_blank" href="{{route('terms')}}">termos de uso</a> e as
                                <a target="_blank" href="{{route('privacity')}}">políticas de privacidade</a>.</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js-custom')
    <script>
        function enviarRegistro() {
            return $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('register-send') }}",
                data: $('#registrar').serialize(),
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                }
            });
        }

    </script>
@endsection

