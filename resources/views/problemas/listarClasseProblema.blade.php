@extends('layouts.app')
@section('title', 'Problemas Conhecidos')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Problemas Conhecidos</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('novaClasseProblema') }}">Novo problema conhecido</a>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('listaClassesProblema') }}">Atualizar Lista</a>
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
                                <th class="col-md-11">Nome</th>
                            </tr>
                            @forelse($classesProblema as $classeProblema)
                                <tr class="classeProblema">
                                    <td class="col-md-1"><a href="{{route('consultaClasseProblema', ['idClasseProblema' => $classeProblema->id])}}">{{$classeProblema->id}}</a></td>
                                    <td class="col-md-11">
                                        <h4><strong>{{$classeProblema->nome}}</strong></h4>
                                        <div>
                                            {{$classeProblema->descricao}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Não existe nenhuma classe de problema.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection