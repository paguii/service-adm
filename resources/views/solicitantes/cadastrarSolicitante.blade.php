@extends('layouts.app')
@section('title', 'Novo Solicitante')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Novo Solicitante</h2>
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
                        <form action="{{route('novoSolicitante')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-8">
                                <label for="nome">Nome:</label>
                                <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome...">
                            </div>
                            <div class="col-md-4">
                                <label for="cpf">CPF:</label>
                                <input class="form-control" type="number" name="cpf" id="cpf" placeholder="CPF">
                            </div>

                            <div class="col-md-8">
                                <label for="endereco">Endereço:</label>
                                <input class="form-control" type="text" name="endereco" id="endereco" placeholder="Endereço">
                            </div>

                            <div class="col-md-4">
                                <label for="email">E-mail:</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="E-mail">
                            </div>

                            <div class="col-md-12">
                                <label for="descricao">Observação:</label>
                                <textarea name="observacao" id="observacao" class="form-control" placeholder="Digite a observação..."></textarea>
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