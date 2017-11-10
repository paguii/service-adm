@extends('layouts.relatorio')
@section('title', 'Relatórios')

@section('tituloRelatorio', 'Relatório de chamados finalizados por tipo de problema')

@section('conteudo')
<h3>
    @if(count($tipoProblemas) > 1)
        Todos
    @endif
</h3>
<table class="table">
        <tr>
            <th>Tipo de Problema</th>
            <th>Quantidade</th>
        </tr>
        @forelse($tipoProblemas as $tipoProblema)
            <tr>
                <td class="col-md-2">{{ $tipoProblema->nome }}</td>
                <td class="col-md-2">{{ $tipoProblema->total }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="col-md-12 text-center">Não foi encontrado nenhum dado.</td>
            </tr>
        @endforelse
</table>
@endsection

@section('rodape')
    Feito com carinho =')
@endsection
