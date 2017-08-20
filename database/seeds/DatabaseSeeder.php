<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SolicitantesSeed::class);
        $this->call(NivelAcessoSeed::class);

        $this->call(AreaAtendimentoSeed::class);
        $this->call(UserSeed::class);
    }
}
