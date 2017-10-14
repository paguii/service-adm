@extends('layouts.app')
@section('title', 'Chamado '.$informacoes[0]->id)


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Chamado #{{ $informacoes[0]->id }}</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Informações:</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('alterarSituacao', ['id_fila' => $filaAtendimento , 'id_chamado' => $informacoes[0]->id]) }}">Mudar Situação</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('editarChamado', ['id_fila' => $filaAtendimento , 'id_chamado' => $informacoes[0]->id]) }}">Editar Dados</a>
                </div>
                <div class="col-md-1 col-md-offset-7">
                    <a href="{{ route('filaAtendimento', ['id_fila'=> $filaAtendimento]) }}">Voltar</a>
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

                        <div class="col-md-4">
                            <h4>Nome Solicitante:</h4>
                            <p>{{ $informacoes[0]->solicitante_nome }}</p>
                        </div>
                        <div class="col-md-8">
                            <h4>Data Criação do Chamado:</h4>
                            <p>{{$informacoes[0]->data_criacao}}</p>
                        </div>
                        <div class="col-md-12">
                            <h4>Area Atendimento:</h4>
                            <p>{{$informacoes[0]->area_atendimento_nome}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Classe do Problema:</h4>
                            <p>{{ $informacoes[0]->classe_problema_nome }} - {{$informacoes[0]->classe_problema_descricao}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Tipo do Problema:</h4>
                            <p>{{$informacoes[0]->tipo_problema_nome}} - {{$informacoes[0]->tipo_problema_descricao}}</p>
                        </div>

                        <div class="col-md-6">
                            <h4>Situação Atual:</h4>
                            <p>{{$informacoes[0]->situacao_nome}}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Histórico</div>

                    <div class="panel-body">
                        @foreach($historicos as $historico)
                            <div>
                                <div class='col-md-4'>
                                    <h4>Usuário:</h4>
                                    <p>{{ $historico->name }}</p>
                                </div>
                                <div class='col-md-8'>
                                    <h4>Data de Alteração:</h4>
                                    <p>{{ $historico->created_at }}</p>
                                </div>
                                
                                <div class='col-md-12'>
                                    <h4>Situação:</h4>
                                    <p>{{ $historico->nome }}</p>
                                </div>

                                <div class='col-md-12'>
                                    <h4>Observação:</h4>
                                    <p>{{ $historico->observacao }}</p>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection