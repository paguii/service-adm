@extends('layouts.app')
@section('title', 'Relatórios Técnico')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Relatório - Atendimento por Técnico</h2>
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
                    <div class="panel-heading">Informações:</div>
                    <div class="panel-body">
                        <form action="{{route('emiteRelatorioTipoProblema')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div><label for="tipoProblema">Técnico:</label></div>
                                <select name="tipoProblema" id="tipoProblema">
                                    <option value="Todos">Todos</option>
                                    @foreach($tiposProblemas as $tiposProblema)
                                        <option value="{{$tiposProblema->id}}">{{$tiposProblema->nome}}</option>
                                    @endforeach
                                </select>    
                            </div>

                            <div class="col-md-4">
                                <div><label for="dataInicial">Data Inicial:</label></div>
                                <input class="form-control" type="date" name="dataInicial" id="dataInicial">
                            </div>

                            <div class="col-md-4">
                                <div><label for="dataFinal">Data Final:</label></div>
                                <input class="form-control" type="date" name="dataFinal" id="dataFinal">
                            </div>

                            <div class="col-md-12">
                                <br>
                                <button class="btn btn-primary" type="submit">Gerar Relatório</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection