@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/home/contato.css">
    <link rel="stylesheet" href="/css/acoes/create.css">
@endsection

@section('content')

    <div class='container section-geral'>
        <section class="section-view">
            <h2 class="titulo-view mb-4">Editar tipo de atividade</h2>

            <form action={{ Route('tipoatividade.update',$tipoAtividade->id) }} method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row d-flex aligm-items-start justify-content-start mb-3">
                    <div class="col-md-6 input-create-box d-flex aligm-items-start justify-content-start flex-column">
                        <span class="tittle-input">Nome<span class="ast">*</span> </span>
                        <input class="w-75 input-text" type="text" name="name" id="name"
                            placeholder="nome da atividade" value="{{$tipoAtividade->name}}" required>
                    </div>
                </div>

                <div class="row d-flex aligm-items-start justify-content-start mb-3">
                    <div class="col-md-6 input-create-box d-flex aligm-items-start justify-content-start flex-column">
                        <span class="tittle-input">Unidade Administrativa<span class="ast">*</span> </span>

                        <select name="unidade_administrativa_id" id="unidade_administrativa_id" class="select-form w-100 " required>
                            @if($tipoAtividade->unidade_administrativa_id)
                                <option value="{{ $tipoAtividade->unidade_administrativa_id }}" selected hidden>{{ $tipoAtividade->unidadeAdministrativa->descricao }}</option>
                            @else
                                <option value="" selected hidden>--- Selecione uma Unidade Administrativa ---</option>
                            @endif

                            @foreach($unidades_administrativas as $unidade_administrativa)
                                <option value="{{ $unidade_administrativa->id }}">{{ $unidade_administrativa->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="text" name="tipoAtividade_id" value="{{$tipoAtividade->id}}" hidden>
                <div class="row col-md-6 d-flex align-items-center justify-content-start">
                    <div class="col-3 text-center d-flex align-items-center justify-content-start">
                        <a class="button" href="{{route('tipoatividade.index')}}">
                            voltar
                        </a>
                    </div>
                    <div class="col-3 d-flex align-items-center justify-content-start">
                        <button type="submit" class="">Atualizar</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
