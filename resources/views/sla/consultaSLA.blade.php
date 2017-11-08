@extends('layouts.app')
@section('title', 'SLA')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>SLA #{{$sla->id}}</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Informações:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('editarSLA', ['sla' => $sla->id])}}">Editar</a>
                </div>
                <div class="col-md-1 col-md-offset-9">
                    <a href="{{route('listarSLA')}}">Voltar</a>
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
                            <p>{{$sla->nome}}</p>
                        </div>
                        <div class="col-md-8">
                            <h4>Data de Criação:</h4>
                            <p>{{$sla->created_at}}</p>
                        </div>

                        <div class="col-md-12">
                            <h4>Descrição:</h4>
                            <p>{{$sla->descricao}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tipos de problemas</div>
                <div class="panel-body">
                    <div class="row">
                        
                        @forelse($tiposProblemas as $tipoProblema)
                            <div class="col-md-4">
                                <h4>Nome:</h4>
                                <p>{{$tipoProblema->nome}}</p>
                            </div>

                            <div class="col-md-8">
                                <h4>Data de Criação:</h4>
                                <p>{{$tipoProblema->created_at}}</p>
                            </div>

                            <div class="col-md-12">
                                <h4>Descrição:</h4>
                                <p>{{$tipoProblema->descricao}}</p>
                            </div>

                            <div class="col-md-12">
                                    <hr>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p>Esse SLA não possui tipos de problemas</p>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection