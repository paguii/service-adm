<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use iService\HistoricoChamado;

class Chamado extends Model
{
    //

    public function inserir($solicitante_id, $classe_problema_id, $area_atendimento_id, $tipoProblema_id, $descricao){
        $chamado = new Chamado;
        $historicoChamado = new HistoricoChamado;
        
    	$chamado->solicitante_id = $solicitante_id;
    	$chamado->classe_problema_id = $classe_problema_id;
    	$chamado->area_atendimento_id = $area_atendimento_id;
        $chamado->tipo_problema_id = $tipoProblema_id;

        $chamado->save();
        
        $historicoChamado->chamado_id = $chamado->id;
        $historicoChamado->situacao_id = 1;
        $historicoChamado->user_id = Auth::id();
        $historicoChamado->observacao = $descricao;

        $historicoChamado->save();
        
        return $chamado->id;
    }
    
    public function mudarSituacao($chamado_id, $situacao_id, $descricao){
        $historicoChamado = new HistoricoChamado;
        
        $historicoChamado->chamado_id = $chamado_id;
        $historicoChamado->situacao_id = $situacao_id;
        $historicoChamado->user_id = Auth::id();
        $historicoChamado->observacao = $descricao;

        $historicoChamado->save();
    }
}
