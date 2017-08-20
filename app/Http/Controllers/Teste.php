<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\Solicitante;

use iService\User;
use iService\AreaAtendimento;

class Teste extends Controller
{
    //Classe para testes rapidos :D 

    public function teste()
    {
        $user = User::find(2);
        $area_atendimento = AreaAtendimento::find(1);

        return $user->getAreasAtendimento()->save($area_atendimento);
        
    }
}
