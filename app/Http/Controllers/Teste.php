<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\NivelAcesso;

class Teste extends Controller
{
    //Classe para testes rapidos :D 

    public function teste(){

    	$teste = new NivelAcesso;
    	return print $teste::find(1)->getOperacoes;

    }
}
