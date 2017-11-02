@extends('layouts.app')
@section('title', 'Incluir usuário a fila de atendimento')


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Incluir usuário a fila de atendimento - {{$areaAtendimento->nome}}</h2>
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
                        <form action="{{ route('incluiUsuarioAreaAtendimento', ['areaAtendimento' => $areaAtendimento->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <div><label for="usuario">Nome do usuário:</label></div>
                                <select name="usuario" id="usuario">
                                    <option value="">----------</option>
                                    @forelse($usuarios as $usuario)       
                                        <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-primary" type="submit" value="incluir">   
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