@extends('layouts.app')

@section('title', 'Lista das filas de atendimentos')

@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Filas de atendimento</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('cadastrarAreaAtendimento')}}"><span>Nova Fila Atendimento</span></a>
                </div>

                <div class="col-md-2">
                    <a href="" onclick="location.reload()"><span>Atualizar Lista</span></a>
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
                    <div class="panel-heading">Filas ativas</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>Fx</th>
                            </tr>
                            @forelse($areasAtendimentoAtivas as $areaAtendimento)
                                <tr>
                                    <td class="col-md-1">
                                        <a href="{{ route('editarAreaAtendimento', ['id_fila' => $areaAtendimento->id]) }}">{{$areaAtendimento->id}}</a>
                                    </td>

                                    <td class="col-md-10">
                                        <h4>{{$areaAtendimento->nome}}</h4>
                                        <div>
                                            {{$areaAtendimento->descricao}}
                                        </div>                             
                                    </td>
                                    <td class="col-md-1"><a href="{{route('incluirUsuarioAreaAtendimento', ['idAreaAtendimento' => $areaAtendimento->id])}}">Adicionar Usuário</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Nenhuma fila foi criada. <a href="{{ route('cadastrarAreaAtendimento')}}">Criar fila</a></td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="2" class="text-right">Total de registros: {{count($areasAtendimentoAtivas)}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Filas desativadas</div>
                    <div class="panel-body">
                        <table class="table table-hover table-stripped tabelaChamados">
                            <tr>
                                <th>Número</th>
                                <th>Descrição</th>
                                <th>Fx</th>
                            </tr>
                            @forelse($areasAtendimentosDesativadas as $areaAtendimento)
                                <tr>
                                    <td class="col-md-1">
                                        <a href="{{ route('editarAreaAtendimento', ['id_fila' => $areaAtendimento->id]) }}">{{$areaAtendimento->id}}</a>
                                    </td>

                                    <td class="col-md-10">
                                        <h4>{{$areaAtendimento->nome}}</h4>
                                        <div>
                                            {{$areaAtendimento->descricao}}
                                        </div>                             
                                    </td>
                                    <td class="col-md-1"><a href="{{route('incluirUsuarioAreaAtendimento', ['idAreaAtendimento' => $areaAtendimento->id])}}">Adicionar Usuário</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Nenhuma fila desativada</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3" class="text-right">Total de registros: {{count($areasAtendimentosDesativadas)}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection