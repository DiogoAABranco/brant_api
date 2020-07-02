<?php

namespace App\Http\Controllers;
use App\TrainingProgram;
use App\Score;

use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    //
    public function simulateCompleteProgram($id){
        $trainingProgram = TrainingProgram::FindOrFail($id);
        foreach($trainingProgram->sessions as $session){
            $session->isDone = true;
            $session->save();
            $score = new Score;
            //duração da sessão
            $score->score_type_id = 3;
            $score->value = rand(40,55);
            $score->session_id = $session->id;
            $score->save();


            foreach($session->games as $game){
                $score1 = new Score;
                //duração desta atividade
                $score1->score_type_id = 2;
                $score1->value = rand(2,15);
                $score1->game_id = $game->id;
                $score1->session_id = $session->id;
                $score1->save();

                //tempo médio de reação
                $score2 = new Score;
                $score2->score_type_id = 1;
                $score2->value = rand(10,30)/10;
                $score2->game_id = $game->id;
                $score2->session_id = $session->id;
                $score2->save();

                //numero de erros
                $score3 = new Score;
                $score3->score_type_id = 4;
                $score3->value = rand(0,20);
                $score3->game_id = $game->id;
                $score3->session_id = $session->id;
                $score3->save();

                //numero de pausas
                $score4 = new Score;
                $score4->score_type_id = 5;
                $score4->value = rand(0,4);
                $score4->game_id = $game->id;
                $score4->session_id = $session->id;
                $score4->save();
            }
        }


        foreach($trainingProgram->sessions as $session){
            $session->scores;
        }

        return response()->json(["msg"=>"dados gerados com sucesso"],200);
    }
}
