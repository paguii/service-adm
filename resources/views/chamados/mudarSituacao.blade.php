@extends('layouts.app')

@section('title', 'Novo Chamado')

@section('header')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Chamado #{{$idChamado}}</h2>
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
                        <form action="{{ route('alteraSituacao', ['id_fila' => $idFilaAtendimento, 'id_chamado' => $idChamado]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div>
                                    <label for="situacao">Situação:</label>
                                </div>
                                <select name="situacao" id="situacao">
                                    <option value="" selected>-----------</option>
                                    @foreach($situacoes as $situacao)
                                        <option value="{{$situacao->id}}">{{$situacao->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- 
                            <div class="col-md-6">
                                <div>
                                    <label for="classeProblema">Classe Problema:</label>
                                </div>
                                <select name="classeProblema" id="classeProblema">
                                    <option value="" selected>-----------</option>
                                    @foreach($classesProblemas as $classeProblema)
                                        <option value="{{$classeProblema->id}}">{{$classeProblema->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label for="tipoProblema">Tipo Problema:</label>
                                </div>
                                <select name="tipoProblema" id="tipoProblema">
                                    <option value="" selected>-----------</option>
                                </select>
                            </div> 
                            -->

                            <div class="col-md-12">
                                <div><label for="descricao">Descrição:</label></div>
                                <textarea class="form-control" name="descricao" id="descricao" rows="8"></textarea>
                            </div>  
                        
                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Mudar Situação">   
                                <input class="btn btn-default" type="button" value="Voltar" onclick="window.history.back();">
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // $( document ).ready(function(){
        //     function createOptionsTipoProblema(data){
        //         $('#tipoProblema').find('option').remove();
        //         $('#tipoProblema').append('<option value="">-----------</option>');
                
        //         for(i=0; i<data.length; i++){
        //             $('#tipoProblema').append('<option value="'+data[i].id+'">'+data[i].nome+'</option>');
        //         }
        //     }

        //     var rota = "{{route('getTipoProblemas', ['id' => 'REPLACEME'])}}";
        //     rota = rota.replace("REPLACEME", "");

        //     $('#classeProblema').change(function(){
        //         var idClasseProblema = $('#classeProblema').val();
        //         $.getJSON(rota + idClasseProblema, function(data){
        //             createOptionsTipoProblema(data);
        //         });
        //     });
        // });
    </script>
@endsection