<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;

use iService\Solicitante;
use iService\TipoProblema;
use iService\ClasseProblema;
use iService\Chamado;
use iService\HistoricoChamado;


class AtendimentoController extends Controller
{
    //Area Atendimento Controller

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('auth');
    }

    public function index($idFilaAtendimento){
        $chamado = new Chamado;
        
        $listaChamadosAguardandoAtendimento = $chamado->join('historicos_chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')->join('solicitantes', 'chamados.solicitante_id', '=', 'solicitantes.id')->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)->where('historicos_chamados.situacao_id', '=', 1)->select('chamados.id', 'solicitantes.nome', 'historicos_chamados.observacao' )->get();
        $listaChamadosPendentes = $chamado->join('historicos_chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')->join('solicitantes', 'chamados.solicitante_id', '=', 'solicitantes.id')->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)->where('historicos_chamados.situacao_id', '<>', 1)->where('historicos_chamados.situacao_id', '<>', 4)->select('chamados.id', 'solicitantes.nome', 'historicos_chamados.observacao' )->get();

        return view('chamados/listaChamados', ['idFilaAtendimento' => $idFilaAtendimento, 'aguardandoAtendimento' => $listaChamadosAguardandoAtendimento, 'pendentes' => $listaChamadosPendentes]);
    }

    public function novoChamadoIndex($id){
        $solicitantes = new Solicitante;
        $classesProblema = new ClasseProblema;

        $solicitantes = $solicitantes->all();
        $classesProblema = $classesProblema->all();

        return view('chamados/novoChamado', ['idFilaAtendimento'=> $id, 'solicitantes' => $solicitantes, 'classesProblema' => $classesProblema]);
    }

    public function criaNovoChamado(Request $request, $idFilaAtendimento){
        $chamado = new Chamado;
        $numeroChamado = $chamado->inserir($request->solicitante, $request->classeProblema, $idFilaAtendimento, $request->tipoProblema, $request->descricao);

        return view('chamados/msgSucesso', ['tituloOperacao' => 'Criação de chamados', 'mensagem' => 'Seu chamado foi criado com sucesso por favor anote o numero do chamado '.$numeroChamado, 'filaAtendimento'=> $idFilaAtendimento]);
    }

    public function getTipoProblemas($idClasseProblema){
        $tipoProblemas = new TipoProblema;
        return json_encode($tipoProblemas->where('classe_problema_id', '=', $idClasseProblema)->get());
    }
}
