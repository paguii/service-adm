<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacoes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('nivel_acesso_id')->unsigned();
            $table->foreign('nivel_acesso_id')->references('id')->on('niveis_acesso');
            
            $table->string('nome');
            $table->text('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operacoes');
    }
}
