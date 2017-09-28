@extends('layouts.app')

@section('title', 'Novo Chamado')

@section('content')

<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Chamado</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div><label for="solicitante">Solicitante:</label><a href="">  Novo Solicitante</a></div>
                            <select name="solicitante" id="solicitante">
                            
                            </select>           
                        </div>


                        <div class="col-md-6">
                            <div><label for="classeProblema">Classe do problema:</label></div>
                            <select name="classeProblema" id="classeProblema">
                            
                            </select>            
                        </div>

                        <div class="col-md-6">
                            <div><label for="tipoProblema">Tipo do problema:</label></div>
                            <select name="tipoProblema" id="tipoProblema">
                        
                            </select>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div><label for="descricao">Descrição:</label></div>
                            <textarea name="descricao" id="descricao" cols="100%" rows="8"></textarea>
                        </div>  
                        
                        <div class="col-md-9">
                            <input type="submit" value="Abrir novo chamado">   
                        </div>
                        
                    </div>
                </div>
            </div>        
        </div>
    </form>
</div>
@endsection
