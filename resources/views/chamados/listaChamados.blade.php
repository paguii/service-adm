@extends('layouts.app')

@section('title', 'Lista dos chamados')

@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Fila de atendimento</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="{{route('novoChamado', ['id_fila'=> $idFilaAtendimento])}}"><span>Novo Chamado</span></a>
                </div>

                <div class="col-md-2">
                    <a href="" onclick="location.reload()"><span>Atualizar Lista</span></a>
                </div>
                
                <div class="col-md-4 col-md-offset-4">
                    <span>Pesquisar Chamado: <input type="number" name="consultaChamado" id="consultaChamado"><i class="glyphicon glyphicon-search"></i></span>
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
                    <div class="panel-heading">Chamados aguardando atendimento</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>SLA</th>
                            </tr>
                            @forelse($aguardandoAtendimento as $chamado)
                                <tr>
                                    <td class="col-md-1">
                                        <a href="{{ route('consultaChamado', ['id_fila' => $idFilaAtendimento, 'id_chamado' => $chamado->id]) }}">{{$chamado->id}}</a>
                                    </td>

                                    <td class="col-md-10">
                                        <h4>{{$chamado->nome}}</h4>
                                        <div>
                                            {{substr($chamado->descricao, 0, 130)."..."}}
                                        </div>                             
                                    </td>

                                    <td class="col-md-1">                                        
                                        {{$chamado->horas_uteis_solucao}} horas                                         
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Eba, nenhum chamado aguardando atendimento. A equipe está de parabéns :D</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-right">Total de registros: {{count($aguardandoAtendimento)}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Chamados em atendimento</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>SLA</th>
                            </tr>
                            @forelse($atendimento as $chamado)
                                <tr>
                                    <td class="col-md-1"><a href="{{ route('consultaChamado', ['id_fila' => $idFilaAtendimento, 'id_chamado' => $chamado->id]) }}">{{$chamado->id}}</a></td>
                                    <td class="col-md-10">
                                        <h4>{{$chamado->nome}}</h4>
                                        <div>
                                            {{substr($chamado->descricao, 0, 130)."..."}}
                                        </div>                                        
                                    </td>
                                    <td class="col-md-1">
                                        {{$chamado->horas_uteis_solucao}} horas  
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Eba, nenhum chamado aguardando atendimento. A equipe está de parabéns :D</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-right">Total de registros: {{count($atendimento)}}</td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Chamados em pausa</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>SLA</th>
                            </tr>
                            @forelse($pausados as $chamado)
                                <tr>
                                    <td class="col-md-1"><a href="{{ route('consultaChamado', ['id_fila' => $idFilaAtendimento, 'id_chamado' => $chamado->id]) }}">{{$chamado->id}}</a></td>
                                    <td class="col-md-10">
                                        <h4>{{$chamado->nome}}</h4>
                                        <div>
                                            {{substr($chamado->descricao, 0, 130)."..."}}
                                        </div>                                        
                                    </td>
                                    <td class="col-md-1">
                                        {{$chamado->horas_uteis_solucao}} horas  
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Eba, nenhum chamado aguardando atendimento. A equipe está de parabéns :D</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-right">Total de registros: {{count($pausados)}}</td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection