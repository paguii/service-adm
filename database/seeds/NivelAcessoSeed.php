<?php

use Illuminate\Database\Seeder;

class NivelAcessoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Popula com Niveis de Acesso
        factory(iService\NivelAcesso::class, 5)->create();
    }
}
