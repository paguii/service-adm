@extends('layouts.app')
@section('title', 'Novo tipo de problema')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Novo tipo de problema</h2>
                </div>
            </div>
            <div class="row">
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
                        <form action="{{route('inserirTipoProblema', ['idClasseProblema' => $idClasseProblema])}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome...">
                            </div>

                            <div class="col-md-8">
                                <div><label for="sla">SLA:</label></div>
                                <select name="sla" id="sla">
                                    <option value="">----------</option>
                                    @foreach($listaSLA as $sla)
                                        <option value="{{$sla->id}}">{{$sla->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição..."></textarea>
                            </div>

                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Criar">   
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