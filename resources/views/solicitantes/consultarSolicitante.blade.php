@extends('layouts.app')
@section('title', 'Solicitante')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Solicitante #{{$solicitante->id}}</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Informações:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('editarSolicitante', ['solicitante' => $solicitante->id])}}">Editar</a>
                </div>
                <div class="col-md-1 col-md-offset-9">
                    <a href="{{route('listarSolicitantes')}}">Voltar</a>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Detalhes</div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-4">
                            <h4>Nome:</h4>
                            <p>{{$solicitante->nome}}</p>
                        </div>
                        <div class="col-md-8">
                            <h4>CPF:</h4>
                            <p>{{$solicitante->cpf}}</p>
                        </div>

                        <div class="col-md-4">
                            <h4>E-mail:</h4>
                            <p>{{$solicitante->email}}</p>
                        </div>
                        <div class="col-md-8">
                            <h4>Data de Criação:</h4>
                            <p>{{$solicitante->created_at}}</p>
                        </div>
                        
                        <div class="col-md-12">
                            <h4>Endereço:</h4>
                            <p>{{$solicitante->endereco}}</p>
                        </div>

                        <div class="col-md-12">
                            <h4>Observações:</h4>
                            <p>{{$solicitante->observacao}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection