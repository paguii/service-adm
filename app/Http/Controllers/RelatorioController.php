<?php

namespace iService\Http\Controllers;

use Illuminate\Http\Request;
use iService\User;
use iService\Chamado;
use iService\HistoricoChamado;
use iService\TipoProblema;
use iService\ClasseProblema;

use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    //Relatorios

    public function relatorioIndex(){
        return view('relatorio/listaRelatorios');
    }

    public function relatorioTecnicoIndex(){
        $users = new User;
        $users = $users->all();

        return view('relatorio/relatorioTecnico', ['tecnicos' => $users] );
    }

    public function relatorioTecnico(Request $request){        
        if($request->tecnico == "Todos"){
            $chamados = new HistoricoChamado;

            $users = new User;
            $users = $users->all();

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('users', 'users.id', '=', 'historicos_chamados.user_id')
            ->where([
                ['historicos_chamados.created_at', '>=', $dataInicial] ,
                ['historicos_chamados.created_at', '<=', $dataFinal],  
                ['historicos_chamados.situacao_id', '=', 4],
            ])
            ->groupBy('users.name')->select('users.name', DB::raw('count(*) as total'))->get();

        }else{
            $chamados = new HistoricoChamado;
            $users = new User;

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('chamados', 'chamados.id', '=', 'historicos_chamados.chamado_id')
            ->where('historicos_chamados.situacao_id', '=', 4)
            ->where('historicos_chamados.user_id', '=', $request->tecnico)
            ->where([
                ['historicos_chamados.created_at', '>=', $dataInicial],
                ['historicos_chamados.created_at', '<=', $dataFinal],
            ])
            ->select('historicos_chamados.chamado_id', 'chamados.created_at as inicio', 'historicos_chamados.created_at as final')->get();

            $users = $users->find($request->tecnico);
        }
        
        return view('relatorio/relatorioTecnicoResult', ['tecnicos' => $users, 'chamados' => $chamados]);
    }

    public function relatorioTipoProblemaIndex(){
        $tiposProblemas = new TipoProblema;
        $tiposProblemas = $tiposProblemas->all();

        return view('relatorio/relatorioTipoProblema', ['tiposProblemas' => $tiposProblemas] );
    }

    public function relatorioTipoProblema(Request $request){        
        if($request->tipoProblema == "Todos"){
            $chamados = new Chamado;

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
            ->where([
                ['chamados.created_at', '>=', $dataInicial] ,
                ['chamados.created_at', '<=', $dataFinal],  
                ['chamados.situacao_id', '=', 4],
            ])
            ->groupBy('tipos_problemas.nome')->select('tipos_problemas.nome as nome', DB::raw('count(*) as total'))->get();

        }else{
            $chamados = new Chamado;

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('tipos_problemas', 'tipos_problemas.id', '=', 'chamados.tipo_problema_id')
            ->where([
                ['chamados.created_at', '>=', $dataInicial] ,
                ['chamados.created_at', '<=', $dataFinal],  
                ['chamados.situacao_id', '=', 4],
                ['chamados.tipo_problema_id', '=', $request->tipoProblema],
            ])
            ->groupBy('tipos_problemas.nome')->select('tipos_problemas.nome as nome', DB::raw('count(*) as total'))->get();
        }
        
        return view('relatorio/relatorioTipoProblemaResult', ['tipoProblemas' => $chamados]);
    }

    public function relatorioClasseProblemaIndex(){
        $classesProblemas = new ClasseProblema;
        $classesProblemas = $classesProblemas->all();

        return view('relatorio/relatorioClasseProblema', ['classesProblemas' => $classesProblemas] );
    }

    public function relatorioClasseProblema(Request $request){        
        if($request->classeProblema == "Todos"){
            $chamados = new Chamado;

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('classes_problemas', 'classes_problemas.id', '=', 'chamados.classe_problema_id')
            ->where([
                ['chamados.created_at', '>=', $dataInicial] ,
                ['chamados.created_at', '<=', $dataFinal],  
                ['chamados.situacao_id', '=', 4],
            ])
            ->groupBy('classes_problemas.nome')->select('classes_problemas.nome as nome', DB::raw('count(*) as total'))->get();

        }else{
            $chamados = new Chamado;

            $dataInicial = implode("-",array_reverse(explode("/",$request->dataInicial)));
            $dataFinal = implode("-",array_reverse(explode("/",$request->dataFinal)));

            $chamados = $chamados->join('classes_problemas', 'classes_problemas.id', '=', 'chamados.classe_problema_id')
            ->where([
                ['chamados.created_at', '>=', $dataInicial] ,
                ['chamados.created_at', '<=', $dataFinal],  
                ['chamados.situacao_id', '=', 4],
                ['chamados.classe_problema_id', '=', $request->classeProblema],
            ])
            ->groupBy('classes_problemas.nome')->select('classes_problemas.nome as nome', DB::raw('count(*) as total'))->get();

        }
        
        return view('relatorio/relatorioClasseProblemaResult', ['classesProblemas' => $chamados]);
    }
}
