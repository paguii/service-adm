@extends('layouts.app')

@section('title', 'Operação Realizada')

@section('content')
    <div class="container">
        <h2>{{$tituloOperacao}}</h2>
        <div>
            <p>{{$mensagem}}</p>
        </div>
        <a href="{{ route('listarSLA') }}">Voltar</a>
    </div>
@endsection