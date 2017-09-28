<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use iService\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User;
        $user = $user->find(Auth::id());

        $areasAtendimento = array();

        foreach($user->getAreasAtendimento as $areaAtendimento){
            $areasAtendimento[$areaAtendimento->id] = $areaAtendimento->nome;
        }

        return view('home', ['areasAtendimento' => $areasAtendimento]);
    }
}