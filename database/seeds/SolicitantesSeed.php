<?php

use Illuminate\Database\Seeder;

class SolicitantesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Popula tabela de solicitantes
    	factory(iService\Solicitante::class, 60)->create();
    }
}
