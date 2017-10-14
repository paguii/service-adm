<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use iService\SLA;

class SLAController extends Controller
{
    //SLA 

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('auth');
    }

    public function SLAIndex(){
        $sla = new SLA;
        $sla = $sla->all();

        return view('sla/listarSLA', ['listaSLA' => $sla]);
    }

    public function consultarSLA(){
        return 'vlw flw';
    }

    public function inserirSLAIndex(){
        return view('sla/cadastrarSLA');
    }

    public function inserirSLA(Request $request){
        $sla = new SLA;
        $id = $sla->inserirSLA($request->nome, $request->descricao, $request->horasUteisResposta, $request->horasUteisSolucao);
        return view('sla/msgSucesso', ['tituloOperacao' => 'Novo SLA', 'mensagem' => 'O SLA de número '.$id.' foi criado com sucesso!']);
    }

    public function editarSLAIndex($idSLA){
       return view('sla/editarSLA', ['idSLA' => $idSLA]);
    }

    public function editarSLA(Request $request, $idSLA){
        $sla = new SLA;
        $id = $sla->editarSLA($idSLA, $request->nome, $request->descricao, $request->horasUteisResposta, $request->$horasUteisSolucao);
        return view('sla/msgSucesso', ['tituloOperacao' => 'Editar SLA', 'mensagem' => 'O SLA de número '.$id.' foi editado com sucesso!']);
    }


}
