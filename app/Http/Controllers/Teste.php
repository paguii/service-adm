<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\Solicitante;

use iService\User;
use iService\Chamado;
use iService\AreaAtendimento;
use Illuminate\Support\Facades\Auth;
use iService\ClasseProblema;

class Teste extends Controller
{
    //Classe para testes rapidos :D 

    public function teste()
    {
        return view('relatorio/relatorioTecnicoResult');
    }
}
