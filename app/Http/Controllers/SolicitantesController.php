<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\Solicitante;

class SolicitantesController extends Controller
{
    //Solicitantes

    public function listarSolicitantes(){
        $solicitantes = new Solicitante;
        $solicitantes = $solicitantes->where('situacao', '=', 1)->paginate(15);

        return view('solicitantes/listarSolicitantes', ['solicitantes' => $solicitantes]);
    }

    public function novoSolicitanteIndex(){
        return view('solicitantes/cadastrarSolicitante');
    }

    public function novoSolicitante(Request $request){
        $solicitante = new Solicitante;
        $id = $solicitante->inserirSolicitante($request->nome, $request->cpf, $request->endereco, $request->email, $request->observacao);

        return view('solicitantes/msgSucesso', ['tituloOperacao' => 'Cadastro de Solicitante', 'mensagem' => 'O solicitante de número '.$id.' foi registrado com sucesso!']);
    }

    public function editarSolicitanteIndex($idSolicitante){
        $solicitante = new Solicitante;
        $solicitante = $solicitante->find($idSolicitante);
        
        return view('solicitantes/editarSolicitante', ['solicitante' => $solicitante]);
    }

    public function editarSolicitante(Request $request, $idSolicitante){
        $solicitante = new Solicitante;
        $id = $solicitante->editarSolicitante($idSolicitante, $request->nome, $request->cpf, $request->endereco, $request->email, $request->observacao, $request->situacao);

        return view('msgSucesso', ['tituloOperecao' => 'Cadastro de Solicitante', 'mensagem' => 'O solicitante de número '.$id.' foi registrado com sucesso!']);
    }

    public function consultarSolicitante($idSolicitante){
        $solicitante = new Solicitante;
        $solicitante = $solicitante->find($idSolicitante);

        return view('solicitantes/consultarSolicitante', ['solicitante'=> $solicitante]);
    }
}
