<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Game;
use App\GameVariable;

class GameController extends Controller
{
    //
    public function index()
    {
        //lista de todos os jogos
        $games = Game::all();

        foreach ($games as $game) {

            $game->gameVariableType;
        }

        return response()->json($games);
    }
    public function recommendedGames($id)
    {


        $games = Game::find([1, 2, 3, 4]);

        foreach ($games as $game) {
            //$game->gameVariableType;
            //Log::info('jogo: '.$game);
            foreach ($game->gameVariableType as $var) {
                //Log::info('var: '.$var);
                $value = rand(1, 100);
                $var->{"value"} = $value;
            }
        }

        return response()->json($games);
    }
}
