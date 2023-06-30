@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/acoes/list.css">
@endsection

@section('content')
    <div class='container'>
        <section class="view-list-acoes">
            <h1 class="text-center mb-4">Meus Certificados</h1>
            <!-- Form para filtros -->
            <form action="" id="form">
                <div class="container">              
                    <div class="row head-table search-box d-flex align-items-center justify-content-center">
                        <div class="col-4 d-flex flex-column align-items-start justify-content-center">
                            <span>Buscar ação</span>
                            <input class="input-box w-75" type="text" name="buscar_acao" id="buscar_acao">
                        </div>

                        <div class="col-3 d-flex flex-column align-items-start justify-content-center">
                            <span>Status</span>
                            <select class="input-box w-75" name="status" id="status">
                                <option></option>
                                <option value="Aprovada">Aprovada</option>
                                <option value="Em análise">Em análise</option>
                                <option value="Devolvido">Devolvido</option>
                            </select>
                        </div>

                        <div class="col-3 d-flex flex-column align-items-start justify-content-center">
                            <span>Natureza</span>
                            <select class="input-box w-75" name="natureza" id="natureza">
                                <option></option>
                                @foreach($naturezas as $natureza)
                                    <option value="{{$natureza->id}}">{{$natureza->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-2 d-flex flex-column align-items-start justify-content-center">
                            <span>Data</span>
                            <input class="input-box w-75" type="date" name="data" id="data">
                        </div>
                    </div>
                </div>
            </form>


            <!-- Cabeçalho -->
            <div class="container">
                <div class="row head-table d-flex align-items-center justify-content-start">
                    <div class="col-3 text-center"><span class="spacing-col">Título</span></div>
                    <div class="col-2 text-center"><span>Data</span></div>
                    <div class="col-2 text-center"><span>Status</span></div>
                    <div class="col-2 text-center"><span>Natureza</span></div>
                    <div class="col-2 text-center"><span>Atividades</span></div>
                    <div class="col-2 text-center"><span></span></div>
                </div>
            </div>

            <!-- Insere os dados na tabela via ajax -->
            <div class="list container overflow-scroll"></div>
        </section>
@endsection


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
    $(document).ready(function(){
        filtro();
    });

    $(document).bind('keyup', '.form', function(e) {
        e.preventDefault();
        filtro();

    });

    $(document).bind('change', '.form', function(e) {
        e.preventDefault();
        filtro();

    });

    function filtro () {
        var dados = $('#form').serialize();
        
        $.ajax({
            url:    "{{route('filtro_acao')}}",
            method: "GET",
            data :  dados
        }).done(function(data){
            $(".list").html(data);
        });
    }

</script>