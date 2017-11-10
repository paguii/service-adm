@extends('layouts.relatorio')
@section('title', 'Relatórios')

@section('tituloRelatorio', 'Relatório de Atendimento por Técnico')

@section('conteudo')
<h3>
    @if(count($tecnicos) > 1)
        Todos
    @else
        {{$tecnicos->name}}
    @endif
</h3>
<table class="table">
    @if(count($tecnicos) > 1)
        <tr>
            <th>Nome Técnico</th>
            <th>Quantidade</th>
        </tr>
        @forelse($chamados as $chamado)
            <tr>
                <td class="col-md-2">{{ $chamado->name }}</td>
                <td class="col-md-2">{{ $chamado->total }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="col-md-12 text-center">Não foi encontrado nenhum dado.</td>
            </tr>
        @endforelse
    @else
        <tr>
            <th>Número Chamado</th>
            <th>Data Criação</th>
            <th>Data Finalização</th>
        </tr>
        @forelse($chamados as $chamado)
            <tr>
                <td class="col-md-2">{{ $chamado->chamado_id }}</td>
                <td class="col-md-3">{{ date('d/m/Y H:i:s',  strtotime($chamado->inicio)) }}</td>
                <td class="col-md-3">{{ date('d/m/Y H:i:s',  strtotime($chamado->final)) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="col-md-12 text-center">Não foi encontrado nenhum dado.</td>
            </tr>
        @endforelse
    @endif

</table>
@endsection

@section('rodape')
    @if(count($tecnicos) > 1)
        Feito com carinho =')
    @else
        TOTAL: {{count($chamados)}}
        <br>
        Feito com carinho =')
    @endif
@endsection
