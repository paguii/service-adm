<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaAtendimento;

class Teste extends Controller
{
    //

    public function teste(){
    	$AreaAtendimento = new AreaAtendimento;
    	$AreaAtendimento->inserir();

    	return "inseriu no banco";
    }
}
