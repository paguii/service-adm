@extends('layouts.app')
@section('title', 'SLA')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>SLA</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Informações:</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('novoSLA') }}">Novo SLA</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('listarSLA') }}">Atualizar Lista</a>
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
                                <th class="col-md-7">Nome</th>
                                <th class="col-md-2">Tempo Resposta</th>
                                <th class="col-md-2">Tempo de Solução</th>
                            </tr>
                            @forelse($listaSLA as $sla)
                                <tr class="classeProblema">
                                    <td class="col-md-1"><a href="{{route('consultaSLA', ['idSLA' => $sla->id])}}">{{$sla->id}}</a></td>
                                    <td class="col-md-7">
                                        <h4><strong>{{$sla->nome}}</strong></h4>
                                        <div>
                                            {{$sla->descricao}}
                                        </div>
                                    </td>
                                    <td class="col-md-2">{{$sla->horas_uteis_resposta}}</td>
                                    <td class="col-md-2">{{$sla->horas_uteis_solucao}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Não existe nenhum SLA.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection