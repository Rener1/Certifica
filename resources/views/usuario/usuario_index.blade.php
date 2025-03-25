@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('css')
    <link rel="stylesheet" href="/css/acoes/list.css">

    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
@endsection

@section('content')
    <section class="view-list-acoes">
        <div class="container">

            <div class="text-center mb-3">
                <h3>Usuários</h3>
            </div>


            <div class="row d-flex align-items-center justify-content-between">

                <div class="col-1">
                    <a type="button" class="button d-flex align-items-center justify-content-around between"
                        href="{{ route('home') }}">
                        Voltar
                        <img src="/images/acoes/listView/voltar.svg" alt="">
                    </a>
                </div>

                <div class="col-7 d-flex align-items-center justify-content-end">
                    <a class="criar-acao-button" href="{{ route('usuario.create') }}">
                        <img class="iconAdd" src="/images/acoes/listView/criar.svg" alt=""> Cadastrar usuário
                    </a>
                </div>
            </div>





            <div class="row head-table d-flex align-items-center justify-content-center">
                <div class="col-3"><span class="spacing-col">@sortablelink('name', 'Nome')</span></div>
                <div class="col-2"><span>@sortablelink('cpf', 'CPF/ Passaporte')</span></div>
                <div class="col-3"><span>@sortablelink('email', 'E-mail')</span></div>
                <div class="col-2"><span>@sortablelink('perfil_id', 'Tipo')</span></div>
                <div class="col-2"><span>Funcionalidades</span></div>
            </div>
        </div>

        <div class="list container">
            @foreach ($usuarios as $user)
                <div class="row linha-table d-flex align-items-center justify-content-center">
                    <div class="col-3">
                        <span class="spacing-col">
                            {{ $user->name }}
                        </span>
                    </div>

                    <div class="col-2">
                        @if($user->cpf != NULL)
                            {{ $user->cpf }}
                        @else
                            {{ $user->passaporte }}
                        @endif

                    </div>

                    <div class="col-3 " >
                        <span >
                            {{ $user->email }}
                        </span>

                    </div>

                    <div class="col-2 d-flex ">
                        @if ($user->perfil_id == 1)
                            Administrador
                        @elseif($user->perfil_id == 2)
                            Coordenador
                        @elseif($user->perfil_id == 3)
                            Gestor Institucional
                        @elseif($user->perfil_id == 4)
                            Integrante
                        @endif
                    </div>
                    <div class="col-2 d-flex align-items-center">
                        <div class="col-6 d-flex align-items-center justify-content-evenly">
                            <span><a href="{{ route('usuario.edit', ['usuario_id' => $user->id]) }}"><img
                                        src="/images/acoes/listView/editar.svg" alt="Editar" title="Editar"></a></span>
                            <span><a href="{{ route('usuario.delete', ['usuario_id' => $user->id]) }}"><img
                                        src="/images/acoes/listView/lixoIcon.svg" alt="Excluir" title="Editar"></a></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $usuarios->links('pagination::bootstrap-4') }}
        </div>
    </section>
@endsection
