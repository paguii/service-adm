<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class ChamadoRelacionado extends Model
{
    //

    protected $table = 'chamados_relacionado';

    function salvar(Request $request){
    	$chamadoRelacionado = new ChamadoRelacionado;
    }
}
