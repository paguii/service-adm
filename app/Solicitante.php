<?php

namespace iService;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    // Informaçao dos solicitantes

    public function inserirSolicitate($nome, $cpf, $endereco, $email, $observacao){
        $solicitante = new Solicitante;

        $solicitante->nome = $nome;
        $solicitante->cpf = $cpf;
        $solicitante->endereco = $endereco;
        $solicitante->email = $email;
        $solicitante->situacao = 1;
        $solicitante->observacao = $observacao;

        $solicitante->save();

        return $solicitante->id;
    }


    public function editarSolicitante($idSolicitante, $nome, $cpf, $endereco, $email, $observacao, $situacao){
        $solicitante = new Solicitante;
        $solicitante = $solicitante->find($idSolicitante);

        $solicitante->nome = $nome;
        $solicitante->cpf = $cpf;
        $solicitante->endereco = $endereco;
        $solicitante->email = $email;
        $solicitante->situacao = $situacao;
        $solicitante->observacao = $observacao;

        $solicitante->save();

        return $solicitante->id;
    }

    public function getTelefones(){
        return $this->hasMany('iService\TelefoneSolicitantes');
    }
}
