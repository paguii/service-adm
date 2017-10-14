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
        $chamado->situacao_id = 1;        
        $chamado->tipo_problema_id = $tipoProblema_id;
        
        $chamado->save();
        
        $historicoChamado->chamado_id = $chamado->id;
        $historicoChamado->situacao_id = 1;
        $historicoChamado->user_id = Auth::id();
        $historicoChamado->observacao = $descricao;

        $historicoChamado->save();
        
        return $chamado->id;
    }

    public function editar($chamado_id, $solicitante_id, $classe_problema_id, $tipo_problema_id){
        $chamado = new Chamado;

        $chamado = $chamado->find($chamado_id);
        
        $chamado->solicitante_id = $solicitante_id;
        $chamado->classe_problema_id = $classe_problema_id;
        $chamado->tipo_problema_id = $tipo_problema_id;

        $chamado->save();

        return $chamado->id;
    }
    
    public function mudarSituacao($chamado_id, $situacao_id, $descricao){
        $chamado = new Chamado;
        $historicoChamado = new HistoricoChamado;
        
        $chamado = $chamado->find($chamado_id);
        $chamado->situacao_id = $situacao_id;

        $chamado->save();

        $historicoChamado->chamado_id = $chamado_id;
        $historicoChamado->situacao_id = $situacao_id;
        $historicoChamado->user_id = Auth::id();
        $historicoChamado->observacao = $descricao;

        $historicoChamado->save();

        return $chamado->id;
    }

    public function getHistoricoChamado($chamado_id){
        $chamado = new Chamado;
        
        $chamado = $chamado
            ->join('historicos_chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')
            ->join('situacoes', 'historicos_chamados.situacao_id', '=', 'situacoes.id')
            ->join('users', 'historicos_chamados.user_id', '=', 'users.id')

            ->where('chamados.id', '=', $chamado_id)

        ->select('historicos_chamados.observacao', 'situacoes.nome', 'users.name', 'historicos_chamados.created_at')->distinct()->get();

        return $chamado;
    }

    public function getInfoChamado($chamado_id){
        $chamado = new Chamado;
        
        $chamado = $chamado
            ->join('classes_problemas', 'classes_problemas.id', '=', 'chamados.classe_problema_id')
            ->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
            ->join('areas_atendimento', 'areas_atendimento.id', '=', 'chamados.area_atendimento_id')
            ->join('situacoes', 'situacoes.id', '=', 'chamados.situacao_id')
            ->join('solicitantes', 'solicitantes.id', '=', 'chamados.solicitante_id')

        ->where('chamados.id', '=', $chamado_id)

        ->select('chamados.id', 'classes_problemas.nome AS classe_problema_nome', 'chamados.created_at AS data_criacao', 'classes_problemas.descricao AS classe_problema_descricao' ,'tipos_problemas.nome AS tipo_problema_nome', 'tipos_problemas.descricao AS tipo_problema_descricao', 'areas_atendimento.nome AS area_atendimento_nome', 'situacoes.nome AS situacao_nome', 'solicitantes.nome AS solicitante_nome')->get();

        return $chamado;
    }
}
