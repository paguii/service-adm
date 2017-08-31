<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\Solicitante;

use iService\User;
use iService\AreaAtendimento;
use Illuminate\Support\Facades\Auth;

class Teste extends Controller
{
    //Classe para testes rapidos :D 

    public function teste()
    {
        $user = User::find(Auth::id());
        //$area_atendimento = AreaAtendimento::find(rand(1,5));
        
        return $user->getAreasAtendimento()->attach(4);
    }
}
