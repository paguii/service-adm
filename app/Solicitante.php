<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    // Informaçao dos solicitantes

    public function getTelefones(){
        return $this->hasMany('iService\Telefone');
    }
}
