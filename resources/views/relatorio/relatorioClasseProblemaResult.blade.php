@extends('layouts.relatorio')
@section('title', 'Relatórios')

@section('tituloRelatorio', 'Relatório de chamados finalizados por classe de problema')

@section('conteudo')
<h3>
    @if(count($classesProblemas) > 1)
        Todos
    @endif
</h3>
<table class="table">
        <tr>
            <th>Tipo de Problema</th>
            <th>Quantidade</th>
        </tr>
        @forelse($classesProblemas as $classeProblema)
            <tr>
                <td class="col-md-2">{{ $classeProblema->nome }}</td>
                <td class="col-md-2">{{ $classeProblema->total }}</td>
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
