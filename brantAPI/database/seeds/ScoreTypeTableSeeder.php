<?php

use Illuminate\Database\Seeder;
use App\ScoreType;

class ScoreTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        ScoreType::truncate();


        ScoreType::create([
            'name' => 'Tempo médio de reação'
        ]);
        ScoreType::create([
            'name' => 'Duração da atividade'
        ]);
        ScoreType::create([
            'name' => 'Duração sessão'
        ]);
        ScoreType::create([
            'name' => 'Número de erros'
        ]);
        ScoreType::create([
            'name' => 'Número de pausas'
        ]);
    }
}
