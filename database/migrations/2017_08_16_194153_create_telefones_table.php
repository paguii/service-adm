<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones_solicitantes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('solicitantes');

            $table->bigInteger('telefone');

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
        Schema::dropIfExists('telefones');
    }
}
