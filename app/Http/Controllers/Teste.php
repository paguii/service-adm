<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\Solicitante;

class Teste extends Controller
{
    //Classe para testes rapidos :D 

    public function teste(){

    	$teste = new Solicitante;
    	return print $teste::find(1)->getTelefones;

    }
}
