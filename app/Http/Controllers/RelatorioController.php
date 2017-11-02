<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    //Relatorios

    public function relatorioIndex(){
        return view('relatorio/listaRelatorios');
    }
}
