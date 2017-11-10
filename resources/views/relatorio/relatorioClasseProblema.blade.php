@extends('layouts.app')
@section('title', 'Relatório Classe Problema')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Relatório -  Chamados finalizados por Classe de Problema</h2>
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
                        <form action="{{route('emiteRelatorioClasseProblema')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div><label for="classeProblema">Classe Problema:</label></div>
                                <select name="classeProblema" id="classeProblema">
                                    <option value="Todos">Todos</option>
                                    @foreach($classesProblemas as $classeProblema)
                                        <option value="{{$classeProblema->id}}">{{$classeProblema->nome}}</option>
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