<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('solicitantes');

            $table->integer('classe_problema_id')->unsigned();
            $table->foreign('classe_problema_id')->references('id')->on('classes_problemas');

            $table->integer('area_atendimento_id')->unsigned();
            $table->foreign('area_atendimento_id')->references('id')->on('areas_atendimento');

            $table->integer('tipo_problema_id')->unsigned();
            $table->foreign('tipo_problema_id')->references('id')->on('classes_problemas');

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
        Schema::dropIfExists('chamados');
    }
}
