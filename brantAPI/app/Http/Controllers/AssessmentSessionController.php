<?php

namespace App\Http\Controllers;

use App\AssessmentSession;
use Illuminate\Http\Request;

class AssessmentSessionController extends Controller
{
    //
    public function index(){

        $assessments = AssessmentSession::all();

        return response()->json($assessments,200);
    }

    public function show($id){

        $assessment = AssessmentSession::findOrFail($id);

        return response()->json($assessment,200);
    }

    public function store(Request $request){

        //$assessments = AssessmentSession::all();

        //return response()->json($assessments,200);
    }
}
