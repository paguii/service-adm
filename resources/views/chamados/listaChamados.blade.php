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
                <div class="col-md-12">
                    <div class="pull-left">
                        <a href="{{route('novoChamado', ['id'=> $idFilaAtendimento])}}"><span>Novo Chamado</span></a>
                    </div>
                    
                    <div class="pull-right">
                        <span>Pesquisar Chamado: <input type="number" name="consultaChamado" id="consultaChamado"></span>
                    </div>
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
                                    <td>{{$chamado->id}}</td>
                                    <td>
                                        <h4>{{$chamado->nome}}</h4>
                                        <div>
                                            {{substr($chamado->observacao, 0, 130)."..."}}
                                        </div>                                        
                                    </td>
                                    <td>8 horas</td>
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
                    <div class="panel-heading">Chamados Pendentes</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>SLA</th>
                            </tr>
                            @forelse($pendentes as $chamado)
                                <tr>
                                    <td>{{$chamado->id}}</td>
                                    <td>
                                        <h4>{{$chamado->nome}}</h4>
                                        <div>
                                            {{substr($chamado->observacao, 0, 130)."..."}}
                                        </div>                                        
                                    </td>
                                    <td>8 horas</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Eba, nenhum chamado aguardando atendimento. A equipe está de parabéns :D</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-right">Total de registros: {{count($pendentes)}}</td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection