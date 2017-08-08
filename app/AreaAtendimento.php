<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class AreaAtendimento extends Model
{
    //

    protected $table = 'areas_atendimento';

    public function inserir(){
    	$areaAtendimento = new AreaAtendimento;
    	$areaAtendimento->nome = "TESTE";
    	$areaAtendimento->descricao = "TESTE2";

    	$areaAtendimento->save();
    }
}
