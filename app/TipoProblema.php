<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class TipoProblema extends Model
{
    //Define precisamente o tipo do problema

    protected $table = "tipos_problemas";

    public function editarTipoProblema($tipo_problema_id, $sla_id, $nome, $descricao){
        $tipoProblema = new TipoProblema;
        
        $tipoProblema = $tipoProblema->find($tipo_problema_id);

        $tipoProblema->sla_id = $sla_id;
        $tipoProblema->nome = $nome;
        $tipoProblema->descricao = $descricao;

        $tipoProblema->save();

        return $tipoProblema->id;
    }

    public function inserirTipoProblema($classe_problema_id, $sla_id, $nome, $descricao){
        $tipoProblema = new TipoProblema;

        $tipoProblema->classe_problema_id = $classe_problema_id;
        $tipoProblema->sla_id = $sla_id;
        $tipoProblema->nome = $nome;
        $tipoProblema->descricao = $descricao;

        $tipoProblema->save();

        return $tipoProblema->id;
    }
}
