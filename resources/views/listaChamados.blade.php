@extends('layouts.app')

@section('title', 'Lista dos chamados')

@section('header')
    <header>
        <div class="container">
            <div class="col-md-12">
                <h2>Fila de atendimento</h2>
            </div>
            <div class="col-md-12">
                <span>Novo Chamado</span>
                <span>Pesquisar Chamado: <input type="number" name="consultaChamado" id="consultaChamado"></span>
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
                           
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Chamados Pendentes</div>
                    <div class="panel-body">
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection