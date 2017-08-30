<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    //Area Atendimento Controller

    public function __construct(){
        //Necessita Autenticação
        $this->middleware('guest');
    }

    public function index($id){
        return $id;
    }
}
