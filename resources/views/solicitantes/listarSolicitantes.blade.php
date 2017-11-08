@extends('layouts.app')
@section('title', 'Solicitantes')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Solicitantes</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('novoSolicitante') }}">Novo Solicitante</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('listarSolicitantes') }}">Atualizar Lista</a>
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
                        <table class="table table-hover table-stripped">
                            <tr>
                                <th class="col-md-1">Id</th>
                                <th class="col-md-9">Nome</th>
                                <th class="col-md-2">CPF</th>
                            </tr>
                            @forelse($solicitantes as $solicitante)
                                <tr class="classeProblema">
                                    <td class="col-md-1"><a href="{{route('consultaSolicitante', ['idSolicitante' => $solicitante->id])}}">{{$solicitante->id}}</a></td>
                                    <td class="col-md-9">
                                        <h4><strong>{{$solicitante->nome}}</strong></h4>
                                        <div>
                                            {{$solicitante->email}}
                                        </div>
                                    </td>
                                    <td class="col-md-2">{{$solicitante->cpf}}</td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Não existe nenhum solicitante.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="text-center">{{$solicitantes->links()}}</div>
            
        </div>
    </div>
@endsection