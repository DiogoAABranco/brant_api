<?php

namespace App\Http\Controllers;

use App\GameVariable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GameVariableController extends Controller
{
    //
    public function update(Request $request){

        try{
            $game_variables = $request->gameVariables;

            foreach($game_variables as $game_variable){

                $gv = GameVariable::findOrFail($game_variable["id"]);

                if($gv->value != $game_variable["value"]){
                    $gv->value = $game_variable["value"];
                    $gv->save();
                }

            }
            return response()->json(["msg" => "Variables updated"], 200);

        }catch(\Exception $e){
            Log::info("request ".$e);
            return response()->json([ "message" => "impossible to update"], 500);
        }


    }
}
