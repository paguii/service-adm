<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class NivelAcesso extends Model
{
    //Define os niveis de acesso dos usuários no sistema

	protected $table = 'niveis_acesso';


	public function getOperacoes(){
		return $this->hasMany('iService\Operacao');
	}

}
