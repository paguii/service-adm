<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use iService\ClasseProblema;
use iService\TipoProblema;
use iService\SLA;

class ProblemaController extends Controller
{
    //Classe Problema e Tipo Problema

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('auth');
    }

    public function classeProblemaIndex(){
        $classeProblema = new ClasseProblema;
        $classeProblema = $classeProblema->all();

        return view('problemas/listarClasseProblema', ['classesProblema' => $classeProblema]);
    }

    public function consultarClasseProblemaIndex($idClasseProblema){
        $classeProblema = new ClasseProblema;
        $tiposProblemas = new TipoProblema;

        $classeProblema = $classeProblema->find($idClasseProblema);
        $tiposProblemas = $tiposProblemas->where('classe_problema_id', '=', $idClasseProblema)->get();

        return view('problemas/consultarClasseProblema', ['classeProblema' => $classeProblema, 'tiposProblemas' => $tiposProblemas]);
    }

    public function consultarTipoProblemaIndex(){
        
    }

    public function editarClasseProblemaIndex($idClasseProblema){
        $classeProblema = new ClasseProblema;
        $classeProblema = $classeProblema->find($idClasseProblema);

        return view('problemas/editarClasseProblema', ['classeProblema' => $classeProblema]);
    }

    public function editarClasseProblema(Request $request, $idClasseProblema){
        $classeProblema = new ClasseProblema;

        $classeProblema->editarClasseProblema($idClasseProblema, $request->nome, $request->descricao);

        return view('problemas/msgSucesso', ['tituloOperacao' => 'Edição de problema conhecido', 'mensagem' => 'O problema conhecido de número '.$idClasseProblema.' foi editado com sucesso']);
    }

    public function editarTipoProblemaIndex($idClasseProblema, $idTipoProblema){
        $tipoProblema = new TipoProblema;
        $tipoProblema = $tipoProblema->find($idTipoProblema);

        $sla = new SLA;
        $sla = $sla->all();

        return view('problemas/editarTipoProblema',['idClasseProblema' => $idClasseProblema, 'idTipoProblema' => $idTipoProblema, 'tipoProblema' => $tipoProblema, 'listaSLA' => $sla]);
    }

    public function editarTipoProblema(Request $request, $idClasseProblema, $idTipoProblema){
        $tipoProblema = new TipoProblema;

        $tipoProblema->editarTipoProblema($idTipoProblema, $request->sla, $request->nome, $request->descricao);

        return view('problemas/msgSucesso', ['tituloOperacao' => 'Edição de tipo de problema', 'mensagem' => 'O tipo de problema de número '.$idTipoProblema.' foi editado com sucesso']);
    }

    public function inserirClasseProblemaIndex(){
        return view('problemas/cadastrarClasseProblema');
    }

    public function inserirClasseProblema(Request $request){
        $classeProblema = new ClasseProblema;
        $id = $classeProblema->inserirClasseProblema($request->nome, $request->descricao);
        
        return view('problemas/msgSucesso', ['tituloOperacao' => 'Criaçao de problema conhecido', 'mensagem' => 'O problema conhecido de numero '.$id.' foi criado com sucesso!']);
    }

    public function inserirTipoProblemaIndex($idClasseProblema){
        $sla = new SLA;
        $sla = $sla->all();

        return view('problemas/cadastrarTipoProblema', ['idClasseProblema' => $idClasseProblema, 'listaSLA' => $sla]);
    }

    public function inserirTipoProblema(Request $request, $idClasseProblema){
        $tipoProblema = new TipoProblema;
        $id = $tipoProblema->inserirTipoProblema($idClasseProblema, $request->sla, $request->nome, $request->descricao);

        return view('problemas/msgSucesso', ['tituloOperacao' => 'Criaçao de tipo de problema ', 'mensagem' => 'O tipo problema de numero '.$id.' foi criado com sucesso!']);
    }

    public function getTipoProblemas($idClasseProblema){
        $tiposProblemas = new TipoProblema;
        return json_encode($tiposProblemas->where('classe_problema_id', '=', $idClasseProblema)->get());
    }
}
