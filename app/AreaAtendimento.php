<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class AreaAtendimento extends Model
{
    //Definicao da Area de Atendimento;

    protected $table = 'areas_atendimento';

    public function inserir($nome, $descricao, $status){
    	$areaAtendimento = new AreaAtendimento;
    	$areaAtendimento->nome = $nome;
    	$areaAtendimento->descricao = $descricao;
    	$areaAtendimento->status = $status;

    	$areaAtendimento->save();
	}
	
	public function getUsers()
	{
		return $this->belongsToMany('iService\User', 'users_areas_atendimento');
	}
}
