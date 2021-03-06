<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;
use iService\User;

class AreaAtendimento extends Model
{
    //Definicao da Area de Atendimento;

    protected $table = 'areas_atendimento';

    public function inserir($nome, $descricao, $situacao = 1){
		$areaAtendimento = new AreaAtendimento;
		
		$areaAtendimento->situacao = $situacao;
		$areaAtendimento->nome = $nome;
		$areaAtendimento->descricao = $descricao;

		$areaAtendimento->save();

		return $areaAtendimento->id;
	}

	public function editar($id, $nome, $descricao, $situacao = 1){
		$areaAtendimento = new AreaAtendimento;

		$areaAtendimento = $areaAtendimento->find($id);

		$areaAtendimento->situacao = $situacao;
		$areaAtendimento->nome = $nome;
		$areaAtendimento->descricao = $descricao;

		$areaAtendimento->save();

		return $areaAtendimento->id;
	}
	
	public function getUsers(){
		return $this->belongsToMany('iService\User', 'users_areas_atendimento');
	}

	public function incluirUsuarioAreaAtendimento($user_id, $idAreaAtendimento){
		$user = new User;
		$user = $user->find($user_id);

		$areaAtendimento = new AreaAtendimento;
		$areaAtendimento = $areaAtendimento->find($idAreaAtendimento);

		$areaAtendimento->getUsers()->attach($user->id);
		return $user->name;
	}
	
}
