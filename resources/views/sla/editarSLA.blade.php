@extends('layouts.app')
@section('title', 'Editar SLA')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Editar SLA</h2>
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
                        <form action="{{route('editaSLA', ['sla' => $sla->id])}}" method="post">
                            {{ csrf_field() }}
                            
                            <div class="col-md-4">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome..." value="{{$sla->nome}}">
                            </div>
                            <div class="col-md-4">
                                <label for="nome">Horas úteis de resposta:</label>
                                <input class="form-control" type="number" name="horasUteisResposta" id="horasUteisResposta" placeholder="Digite quantidade de horas..." value="{{$sla->horas_uteis_resposta}}">
                            </div>
                            <div class="col-md-4">
                                <label for="nome">Hora úteis de solução:</label>
                                <input class="form-control" type="number" name="horasUteisSolucao" id="horasUteisSolucao" placeholder="Digite quantidade de horas.." value="{{$sla->horas_uteis_solucao}}">
                            </div>

                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição...">{{$sla->descricao}}</textarea>
                            </div>

                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Editar">   
                                <input class="btn btn-default" type="button" value="Voltar" onclick="window.history.back();">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection