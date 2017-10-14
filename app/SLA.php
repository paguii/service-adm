<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class SLA extends Model
{
    //SLA

    protected $table = "sla";

    public function inserirSLA($nome, $descricao, $horas_uteis_resposta, $horas_uteis_solucao){
        $sla = new SLA;
        
        $sla->nome = $nome;
        $sla->descricao = $descricao;
        $sla->horas_uteis_resposta = $horas_uteis_resposta;
        $sla->horas_uteis_solucao = $horas_uteis_solucao;

        $sla->save();

        return $sla->id; 
    }

    public function editarSLA($idSLA, $nome, $descricao, $horas_uteis_resposta, $horas_uteis_solucao){
        $sla = new SLA;
        $sla = $sla->find($idSLA);

        $sla->nome = $nome;
        $sla->descricao = $descricao;
        $sla->horas_uteis_resposta = $horas_uteis_resposta;
        $sla->horas_uteis_solucao = $horas_uteis_solucao;

        $sla->save();

        return $sla->id;
    }
}
