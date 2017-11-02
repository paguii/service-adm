<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;

use iService\Solicitante;
use iService\TipoProblema;
use iService\ClasseProblema;
use iService\Chamado;
use iService\HistoricoChamado;
use iService\Situacao;


class ChamadoController extends Controller
{
    //Area Atendimento Controller

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('auth');
    }

    public function index($idFilaAtendimento){
        $chamado = new Chamado;

        $listaChamadosEmAtendimento = 
        $chamado->join('solicitantes', 'solicitante_id', '=', 'solicitantes.id')
                ->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
                ->join('sla', 'tipos_problemas.sla_id', '=', 'sla.id')
            
                ->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)
                ->where('chamados.situacao_id', '=', 2)
                
                
                ->select('chamados.id', 'solicitantes.nome', 'chamados.descricao', 'sla.horas_uteis_solucao')
                ->distinct()->get();

        $listaChamadosPausados = 
            $chamado->join('solicitantes', 'solicitante_id', '=', 'solicitantes.id')
                    ->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
                    ->join('sla', 'tipos_problemas.sla_id', '=', 'sla.id')
                
                    ->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)
                    ->where('chamados.situacao_id', '=', 3)
                    
                    ->select('chamados.id', 'solicitantes.nome', 'chamados.descricao', 'sla.horas_uteis_solucao')
                    ->distinct()->get();

        $listaChamadosAguardandoAtendimento = 
            $chamado->join('solicitantes', 'chamados.solicitante_id', '=', 'solicitantes.id')
                    ->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
                    ->join('sla', 'tipos_problemas.sla_id', '=', 'sla.id')

                    ->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)
                    ->where('chamados.situacao_id', '=', 1)

                    ->select('chamados.id', 'solicitantes.nome', 'chamados.descricao', 'sla.horas_uteis_solucao')
                    ->distinct()->get();

        return view('chamados/listaChamados', ['idFilaAtendimento' => $idFilaAtendimento, 'aguardandoAtendimento' => $listaChamadosAguardandoAtendimento, 'pausados' => $listaChamadosPausados, 'atendimento' => $listaChamadosEmAtendimento]);
    }

    public function novoChamadoIndex($idFilaAtendimento){
        $solicitantes = new Solicitante;
        $classesProblema = new ClasseProblema;

        $solicitantes = $solicitantes->all();
        $classesProblema = $classesProblema->all();

        return view('chamados/novoChamado', ['idFilaAtendimento'=> $idFilaAtendimento, 'solicitantes' => $solicitantes, 'classesProblema' => $classesProblema]);
    }

    public function criaNovoChamado(Request $request, $idFilaAtendimento){
        $chamado = new Chamado;
        
        $numeroChamado = $chamado->inserir($request->solicitante, $request->classeProblema, $idFilaAtendimento, $request->tipoProblema, $request->descricao);

        return view('chamados/msgSucesso', ['tituloOperacao' => 'Criação de chamados', 'mensagem' => 'Seu chamado foi criado com sucesso por favor anote o numero do chamado '.$numeroChamado, 'filaAtendimento'=> $idFilaAtendimento]);
    }

    public function consultarChamadoIndex($idFilaAtendimento, $idChamado){
        $chamado = new Chamado;

        $historicos = $chamado->getHistoricoChamado($idChamado); 
        $infoChamado = $chamado->getInfoChamado($idChamado);

        return view('chamados/consultarChamado', ['historicos' => $historicos, 'informacoes' => $infoChamado, 'filaAtendimento' => $idFilaAtendimento]);
    }

    public function alterarSituacaoIndex($idFilaAtendimento, $idChamado){
        $classesProblema = new ClasseProblema;
        $situacoes = new Situacao;

        $classesProblema = $classesProblema->all();
        $situacoes = $situacoes->all();

        return view('chamados/mudarSituacao', ['situacoes'=> $situacoes, 'idFilaAtendimento' => $idFilaAtendimento, 'idChamado'=> $idChamado, 'classesProblemas' => $classesProblema]);
    }

    public function alterarSituacao(Request $request, $idFilaAtendimento, $idChamado){
        $chamado = new Chamado;
        $chamado->mudarSituacao($idChamado, $request->situacao, $request->descricao);
        return view('chamados/msgSucesso', ['tituloOperacao'=> 'Mudança de Situação', 'mensagem' => 'Chamado '.$idChamado.' alterado com sucesso!', 'filaAtendimento' => $idFilaAtendimento]);
    }

    public function editarChamadoIndex($idFilaAtendimento, $idChamado){
        $chamado = new Chamado;
        $solicitantes = new Solicitante;
        $classesProblema = new ClasseProblema;

        $chamado = $chamado->find($idChamado);
        $solicitantes = $solicitantes->all();
        $classesProblema = $classesProblema->all();

        return view('chamados/editarChamado', ['solicitantes' => $solicitantes, 'classesProblema' => $classesProblema, 'chamado' => $chamado, 'filaAtendimento' => $idFilaAtendimento]);
    }

    public function editarChamado(Request $request, $idFilaAtendimento, $idChamado){
        $chamado = new Chamado;
        $chamado->editar($idChamado, $request->solicitante, $request->classeProblema, $request->tipoProblema);

        return view('chamados/msgSucesso', ['tituloOperacao'=> 'Editar Chamado', 'mensagem' => 'Chamado '.$idChamado.' alterado com sucesso!', 'filaAtendimento' => $idFilaAtendimento]);
    }

}
