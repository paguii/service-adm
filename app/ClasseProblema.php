<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class ClasseProblema extends Model
{
    //Define de forma macro o tipo de problema.

    protected $table = "classes_problemas";

    public function inserirClasseProblema($nome, $descricao){
        $classeProblema = new ClasseProblema;

        $classeProblema->nome = $nome;
        $classeProblema->descricao = $descricao;

        $classeProblema->save();

        return $classeProblema->id;
    }


    public function editarClasseProblema($id_classe_problema, $nome, $descricao){
        $classeProblema = new ClasseProblema;
        $classeProblema = $classeProblema->find($id_classe_problema);
        
        $classeProblema->nome = $nome;
        $classeProblema->descricao = $descricao;

        $classeProblema->save();

        return $classeProblema->id;
    }
}
