<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Patient;

class GameController extends Controller
{
    //
    public function index(){
        //lista de todos os jogos
        $games = Game::all();

        foreach($games as $game){

            $game->gameVariableType;
        }

        return response()->json($games);
    }
    public function recommendedGames($id){


        $games = Game::find([1,2,3,4,5,6]);

        foreach($games as $game){

            $game->gameVariableType;
        }

        return response()->json($games);

    }
}
