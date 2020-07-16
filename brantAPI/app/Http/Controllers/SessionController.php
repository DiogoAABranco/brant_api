<?php

namespace App\Http\Controllers;
use App\Session;
use App\TrainingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SessionController extends Controller
{
    //

    public function update(Request $request){

        LOG::info("sessão: ".$request);
        $session = Session::findOrFail($request->id);
        $notes = $request->notes;
        if($notes != null){
            $session->notes = $notes;
        }

        $session->save();
        return response()->json(["msg" =>"success", "notes" =>$notes],201);
    }

    public function destroy($id){

        $session = Session::find($id);//atualizar n de sessoes do treino
        $trainingProgram = TrainingProgram::find($session->training_program_id);

        if($trainingProgram->n_sessions == 1){
            TrainingProgram::destroy($session->training_program_id);
        }
        else{
            $n_sessions = $trainingProgram->n_sessions;
            $trainingProgram->n_sessions = $n_sessions - 1;
            $trainingProgram->save();
            $session = Session::destroy($id);
        }


        Log::info("treino: " .$trainingProgram->id);
        return response()->json(["msg" => "Sessão eliminada","trainingProgram"=>$trainingProgram],200);



    }
}
