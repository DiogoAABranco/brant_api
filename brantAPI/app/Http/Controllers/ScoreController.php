<?php

namespace App\Http\Controllers;

use App\ScoreType;
use Illuminate\Http\Request;
use App\TrainingProgram;
use stdClass;

class ScoreController extends Controller
{
    //
    public function programScore($id){

        $trainingProgram = TrainingProgram::findOrFail($id);
        $trainingProgram->patient;
        $games = $trainingProgram->sessions->first()->games;

        $scoreType = ScoreType::all();

        $scoresFinal = new stdClass();

        $gamesScore =[];

        foreach($games as $game){

            $tempGame = [];

            foreach($trainingProgram->sessions as $session){

                foreach($session->scores as $score){

                    if($game->id == $score->game_id){
                        $score->session;
                        array_push($tempGame, $score);

                    }
                }

            }

            array_push($gamesScore,$tempGame);
        }
        $scoresFinal->gameScore = $gamesScore;
        //array_push($scoresFinal,(["games"=>$gamesScore]));

        $sessionsVar = [];

        foreach($trainingProgram->sessions as $session){

            foreach($session->scores as $score){

                if($score->game_id == null){
                    $score->session;
                    array_push($sessionsVar, $score);

                }
            }

        }
        $scoresFinal->sessionsScore = $sessionsVar;
        //array_push($scoresFinal,(["session" => $sessionsVar]));


        //types of scores
        $scoreTypeSession = [];
        $scoreTypeGames = [];

        foreach($scoreType as $scoreT){

            array_push($scoreTypeGames,$scoreT);
        }

        foreach($trainingProgram->sessions->first()->scores as $score){

            if($score->game_id == null){

                foreach($scoreType as $key=>$type){

                    if($score->score_type_id == $type->id){

                        array_push($scoreTypeSession, $type);

                        array_splice($scoreTypeGames, $key, 1);

                        json_encode($scoreTypeGames);
                    }
                }
            }
        }



        return response()->json(["patient" =>$trainingProgram->patient,"scores" => $scoresFinal,"games" => $games,"scoreTypeSession" => $scoreTypeSession,"scoreTypeGames" =>$scoreTypeGames ],200);
    }
}
