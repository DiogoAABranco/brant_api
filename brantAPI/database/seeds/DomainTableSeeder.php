<?php

use Illuminate\Database\Seeder;
use App\Domain;

class DomainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Domain::truncate();
        Domain::create(['name' => 'Visuo-espacial/executiva']);
        Domain::create(['name' => 'Nomeação']);
        Domain::create(['name' => 'Memória']);
        Domain::create(['name' => 'Atenção']);
        Domain::create(['name' => 'Linguagem']);
        Domain::create(['name' => 'Abstração']);
        Domain::create(['name' => 'Evocação diferida']);
        Domain::create(['name' => 'Orientação']);

        Domain::create(['name' => 'Memória visual', 'domain_id' => 3]);
        Domain::create(['name' => 'Memória verbal', 'domain_id' => 3]);

        Domain::create(['name' => 'Atenção seletiva', 'domain_id' => 4]);
        Domain::create(['name' => 'Atenção dividida', 'domain_id' => 4]);

    }
}
