@extends('layouts.app')
@section('title', 'Relatórios')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Relatórios</h2>
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
                    <div class="panel-heading">Tipos de relatório:</div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="text-center relatorio">
                                <a href="{{route('relatorioTecnico')}}">Relatório de atendimento por técnico</a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="text-center relatorio">
                                <a href="{{route('relatorioTipoProblema')}}">Relatório de atendimentos por tipo de problema</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="text-center relatorio">
                                <a href="{{route('relatorioClasseProblema')}}">Relatório de atendimento por classes de problemas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection