<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;

use iService\Solicitante;
use iService\TipoProblema;
use iService\ClasseProblema;
use iService\Chamado;
use iService\HistoricoChamado;
use iService\Situacao;


class AtendimentoController extends Controller
{
    //Area Atendimento Controller

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('auth');
    }

    public function index($idFilaAtendimento){
        $chamado = new Chamado;

        $listaChamadosPendentes = $chamado->join('historicos_chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')->join('solicitantes', 'solicitante_id', '=', 'solicitantes.id')->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)->where('chamados.situacao_id', '<>', 1)->where('chamados.situacao_id', '<>', 4)->select('chamados.id', 'solicitantes.nome', 'historicos_chamados.observacao')->distinct()->get();

        $listaChamadosAguardandoAtendimento = $chamado->join('historicos_chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')->join('solicitantes', 'chamados.solicitante_id', '=', 'solicitantes.id')->where('chamados.area_atendimento_id', '=', $idFilaAtendimento)->where('chamados.situacao_id', '=', 1)->select('chamados.id', 'solicitantes.nome', 'historicos_chamados.observacao' )->distinct()->get();

        return view('chamados/listaChamados', ['idFilaAtendimento' => $idFilaAtendimento, 'aguardandoAtendimento' => $listaChamadosAguardandoAtendimento, 'pendentes' => $listaChamadosPendentes]);
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
