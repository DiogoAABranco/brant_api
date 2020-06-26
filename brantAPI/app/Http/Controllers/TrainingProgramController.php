<?php

namespace App\Http\Controllers;
use App\TrainingProgram;
use App\Game;

use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{
    //
    public function index(){

        //depois filtrar por programas ativos
        $trainingPrograms = TrainingProgram::all();

        foreach($trainingPrograms as $trainingProgram){

            $trainingProgram->patient;
        }

        return response()->json($trainingPrograms);
    }
    public function show($id){

        $trainingProgram = TrainingProgram::findOrFail($id);
        $trainingProgram->patient;
        $trainingProgram->sessions;

        return response()->json($trainingProgram);
    }

    public function store(Request $request){




    }
}
