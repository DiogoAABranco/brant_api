<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\TrainingProgram;
use App\Session;
use App\Game;
use App\GameVariable;
use App\GameVariableType;

class TrainingProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TrainingProgram::truncate();
        Session::truncate();
        DB::table('game_session')->truncate();
        GameVariable::truncate();


        // $trainingProgram = TrainingProgram::create([
        //     'start_date' => date("Y/m/d"),
        //     'n_sessions' => 20,
        //     'patient_id' => '1',
        //     'user_id' => '1',
        // ]);


        // for ($i = 0; $i < 21; $i++){
        //     $session = Session::create([
        //         'date' => date("Y/m/d"),
        //         'duration' => 23,
        //         'training_program_id' => $trainingProgram->id
        //     ]);
        //     $game=Game::find(1);
        //     $game2=Game::find(2);
        //     $game3=Game::find(3);
        //     $game4=Game::find(4);

        //     $session->games()->attach($game);
        //     $session->games()->attach($game2);
        //     $session->games()->attach($game3);
        //     $session->games()->attach($game4);

        // }
        // $games = TrainingProgram::find(1)->sessions->first()->games->all();

        //     foreach($games as $game){
        //         //Log::info('jogo: '.$game);
        //         foreach($game->gameVariableType->all() as $var){
        //             //Log::info('var: '.$var);
        //             GameVariable::create([
        //                 'value' => rand(1,100),
        //                 'game_id' => $game->id,
        //                 'training_program_id' => TrainingProgram::find(1)->id,
        //                 'game_variable_type_id' => $var->id
        //             ]);
        //         }

        //     }



    }
}
