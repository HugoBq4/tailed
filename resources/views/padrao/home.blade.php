@extends('padrao.layout')

@section('titulo', 'Tailed memes')

@section('conteudo')
    <div class="container pos-container">
        <div class="card bg-30 border-all-60">
            <div class="pd-container">
                <h2>{{json_encode(['index' => ['logado' => Auth::check()]])}}</h2>
            </div>
        </div>
    </div>
@endsection

@section('js-custom')
@endsection

