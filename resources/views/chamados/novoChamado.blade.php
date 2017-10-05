@extends('layouts.app')

@section('title', 'Novo Chamado')

@section('content')

<div class="container">
    <form action="{{route('criaNovoChamado', ['idFilaAtendimento'=> $idFilaAtendimento])}}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Chamado</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div><label for="solicitante">Solicitante:</label><a href="">  Novo Solicitante</a></div>
                            <select name="solicitante" id="solicitante">
                                <option value="" selected>-----------</option>
                                @foreach($solicitantes as $solicitante)
                                <option value="{{$solicitante->id}}">{{$solicitante->nome}}</option>
                                @endforeach
                            </select>           
                        </div>
                        <div class="col-md-6">
                            <div><label for="classeProblema">Classe do problema:</label></div>
                            <select name="classeProblema" id="classeProblema">
                                <option value="" selected>-----------</option>
                                @foreach($classesProblema as $classeProblema)
                                    <option value="{{$classeProblema->id}}">{{$classeProblema->nome}}</option>
                                @endforeach
                            </select>            
                        </div>

                        <div class="col-md-6">
                            <div><label for="tipoProblema">Tipo do problema:</label></div>
                            <select name="tipoProblema" id="tipoProblema">
                                <option value="" selected>-----------</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <div><label for="descricao">Descrição:</label></div>
                            <textarea class="form-control" name="descricao" id="descricao" rows="8"></textarea>
                        </div>  
                        
                        <div class="col-md-12">
                            <br>
                            <input class="btn btn-primary" type="submit" value="Abrir novo chamado">   
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
    });
</script>
@endsection