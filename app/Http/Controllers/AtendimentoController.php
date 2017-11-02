<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use iService\User;
use iService\AreaAtendimento;

class AtendimentoController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = new User;
        $user = $user->find(Auth::id());

        $areasAtendimento = array();

        foreach($user->getAreasAtendimento as $areaAtendimento){
            $areasAtendimento[$areaAtendimento->id] = $areaAtendimento->nome;
        }

        return view('home', ['areasAtendimento' => $areasAtendimento]);
    }
    public function listarAreasAtendimentoIndex(){
        $areasAtendimentoDesativadas = new AreaAtendimento;
        $areaAtendimentoAtivas = new AreaAtendimento; 

        $areasAtendimentoDesativadas = $areasAtendimentoDesativadas->where('situacao', '=', 0)->get();
        $areaAtendimentoAtivas = $areaAtendimentoAtivas->where('situacao', '=', 1)->get();

        return view('atendimento/listarAreaAtendimento', ['areasAtendimentoAtivas' => $areaAtendimentoAtivas, 'areasAtendimentosDesativadas' => $areasAtendimentoDesativadas]);
    }

    public function cadastrarAreaAtendimentoIndex(){
        return view('atendimento/cadastrarAreaAtendimento');
    }

    public function cadastrarAreaAtendimento(Request $request){
        $areaAtendimento = new AreaAtendimento;
        $id = $areaAtendimento->inserir($request->nomeFila, $request->descricao);
        return view('atendimento/msgSucesso', ['tituloOperacao' => 'Criação de fila de atendimento', 'mensagem' => 'A fila '.$id.' foi criada com sucesso!']);
    }

    public function editarAreaAtendimentoIndex($idAreaAtendimento){
        $areaAtendimento = new AreaAtendimento;
        $areaAtendimento = $areaAtendimento->find($idAreaAtendimento);

        return view('atendimento/editarAreaAtendimento', ['idAreaAtendimento' => $idAreaAtendimento, 'nomeFila' => $areaAtendimento->nome, 'descricao' => $areaAtendimento->descricao, 'situacao' => $areaAtendimento->situacao]);
    }

    public function editarAreaAtendimento(Request $request, $idAreaAtendimento){
        $areaAtendimento = new AreaAtendimento;
        $areaAtendimento->editar($idAreaAtendimento, $request->nomeFila, $request->descricao, $request->situacao);
        return view('atendimento/msgSucesso', ['tituloOperacao' => 'Editar fila de atendimento', 'mensagem' => 'A fila '.$id.' foi editada com sucesso!']);
    }
    
    public function incluirUsuarioAreaAtendimentoIndex($idAreaAtendimento){
        $usuarios = new User;
        $usuarios = $usuarios->join('users_areas_atendimento', 'users_areas_atendimento.user_id', '=', 'users.id')->where('situacao', '=', 1)->get();

        $areaAtedimento = new AreaAtendimento;
        $areaAtedimento = $areaAtedimento->find($idAreaAtendimento);
        
        return view('atendimento/incluirUsuarioAreaAtendimento', ['areaAtendimento' => $areaAtedimento, 'usuarios' => $usuarios]);
    }

    public function incluirUsuarioAreaAtendimento($idAreaAtendimento, Request $request){
        
    }
}