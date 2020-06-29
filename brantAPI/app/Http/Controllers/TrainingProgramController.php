<?php

namespace App\Http\Controllers;

use App\TrainingProgram;
use App\Game;
use App\Session;
use App\GameVariable;
use App\GameVariableType;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
    //
    public function index()
    {

        //depois filtrar por programas ativos
        $trainingPrograms = TrainingProgram::all();

        foreach ($trainingPrograms as $trainingProgram) {

            $trainingProgram->patient;
        }

        return response()->json($trainingPrograms);
    }
    public function show($id)
    {

        $trainingProgram = TrainingProgram::findOrFail($id);
        $trainingProgram->patient;
        $trainingProgram->sessions;
        $trainingProgram->gameVariables;

        foreach($trainingProgram->gameVariables as $gameVariable){

            $nameVar = GameVariableType::find($gameVariable->game_variable_type_id);
            $gameVariable->{"name"} = $nameVar->name;
            $gameVariable->game;

        }
        foreach($trainingProgram->sessions as $session){
            $session->games;
        }

        return response()->json($trainingProgram);
    }

    public function store(Request $request)
    {

        $user_id = $request->user_id;
        $patient_id = $request->patient_id;
        $n_sessions = $request->n_sessions;
        $start_date = $request->start_date;
        $days = $request->days_of_the_week;
        $games = $request->games;
        $n_games = 4;

        //Log::info(print_r($games, true));
        $trainingProgram = TrainingProgram::create([
            'start_date' => $start_date,
            'n_sessions' => $n_sessions,
            'patient_id' => $patient_id,
            'user_id' => $user_id,
        ]);


        $sessionsDates = [];
        $i = 0;

        while (count($sessionsDates) < $n_sessions) {
            //$tempDate = date("Y-m-d");
            $tempDate = date('Y-m-d', strtotime($start_date . ' + ' . $i . ' days'));
            //Log::info('dateTemp: ' . $tempDate);

            for ($j = 0; $j < count($days); $j++) {
                if (date('w', strtotime($tempDate)) == $days[$j]) {
                    array_push($sessionsDates, $tempDate);
                }
            }
            $i++;
        }

        foreach($sessionsDates as $sessionDate){
            $session = new Session;
            $session->date = $sessionDate;
            $session->duration = $n_games*5;
            $trainingProgram->sessions()->save($session);

            //adicionar os jogos a cada sessão
            foreach($games as $game){
                //Log::info($game['id']);
                $dbGame = Game::find($game['id']);

                $session->games()->attach($dbGame);
            }

        }

        //adicionar as game_variable ao treino
        foreach($games as $game){

            foreach($game['game_variable_type'] as $var){
                //Log::info('var: '.$var);
                GameVariable::create([
                    'value' => $var['value'],
                    'game_id' => $game['id'],
                    'training_program_id' => $trainingProgram->id,
                    'game_variable_type_id' => $var['id']
                ]);
            }

        }

        $trainingProgram->sessions;
        $trainingProgram->gameVariables;

        return response()->json($trainingProgram);
    }
}
