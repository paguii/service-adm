<?php

use Illuminate\Database\Seeder;

class AreaAtendimentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Popula areas de atendimento

        factory(iService\AreaAtendimento::class, 8)->create();
    }
}
