<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoProblemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_problemas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('classe_problema_id')->unsigned();
            $table->foreign('classe_problema_id')->references('id')->on('classes_problemas');

            $table->integer('sla_id')->unsigned();
            $table->foreign('sla_id')->references('id')->on('SLA');

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
        Schema::dropIfExists('tipos_problemas');
    }
}
