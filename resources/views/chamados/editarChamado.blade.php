@extends('layouts.app')
@section('title', 'Editar Chamado '.$chamado->id)


@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Chamado #{{ $chamado->id }}</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <h3>Informações:</h3>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container">
    <form action="{{route('editaChamado', ['id_fila'=> $filaAtendimento, 'id_chamado' => $chamado->id])}}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Detalhes</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div><label for="solicitante">Solicitante:</label><a href="">  Novo Solicitante</a></div>
                            <select name="solicitante" id="solicitante">
                                <option value="">-----------</option>
                                @foreach($solicitantes as $solicitante)
                                    {{$selected = ''}}
                                    @if($chamado->solicitante_id == $solicitante->id)
                                        {{$selected = 'selected'}}
                                    @endif
                                    <option value="{{$solicitante->id}}" {{ $selected }}>{{$solicitante->nome}}</option>
                                @endforeach
                            </select>           
                        </div>
                        <div class="col-md-6">
                            <div><label for="classeProblema">Classe do problema:</label></div>
                            <select name="classeProblema" id="classeProblema">
                                <option value="">-----------</option>
                                @foreach($classesProblema as $classeProblema)
                                {{$selected = ''}}
                                    @if($chamado->classe_problema_id == $classeProblema->id)
                                        {{$selected = 'selected'}}
                                    @endif
                                    <option value="{{$classeProblema->id}}" {{$selected}}>{{$classeProblema->nome}}</option>
                                @endforeach
                            </select>            
                        </div>

                        <div class="col-md-6">
                            <div><label for="tipoProblema">Tipo do problema:</label></div>
                            <select name="tipoProblema" id="tipoProblema">
                                <option value="">-----------</option>
                            </select>
                        </div>
                    
                        
                        <div class="col-md-12">
                            <br>
                            <input class="btn btn-primary" type="submit" value="Editar chamado">   
                            <input class="btn btn-default" type="button" value="Voltar" onclick="window.history.back();">
                        </div>
                        
                    </div>
                </div>
            </div>        
        </div>
    </form>
</div>
<script type="text/javascript">
    $( document ).ready(function(){
        function createOptionsTipoProblema(data){
            $('#tipoProblema').find('option').remove();
            $('#tipoProblema').append('<option value="">-----------</option>');
            
            for(i=0; i<data.length; i++){
                $('#tipoProblema').append('<option value="'+data[i].id+'">'+data[i].nome+'</option>');
            }
        }

        var rota = "{{route('getTipoProblemas', ['id' => 'REPLACEME'])}}";
        rota = rota.replace("REPLACEME", "");

        
        $('#classeProblema').change(function(){
            var idClasseProblema = $('#classeProblema').val();
            $.getJSON(rota + idClasseProblema, function(data){
                createOptionsTipoProblema(data);
            });
        });

        $('#classeProblema').change();
    });
</script>
@endsection