<?php

namespace App\Http\Controllers;

use App\AssessmentSession;
use App\AssessmentResult;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentSessionController extends Controller
{
    //
    public function index(){

        $assessments = AssessmentSession::all();

        return response()->json($assessments,200);
    }

    public function show($id){

        $assessment = AssessmentSession::findOrFail($id);
        $images = $assessment->images;


        return response()->json($assessment,200);
    }

    public function store(Request $request){

        //data sent with form data type NOT JSON!!!!

        $data = json_decode($request->data);

        $files = $request->only('files');

        $arr_path = [];

        foreach($files as $file){

            foreach($file as $path){

                $temp = $path->store('upload', 'public');
                array_push($arr_path, $temp );

            }

        }

        //create new session
        $session = new AssessmentSession;
        $session->date = date("Y/m/d");
        $session->patient_id = $data->patient_id;
        $session->user_id = $data->user_id;
        $session->assessment_tool_id = $data->assessment_tool_id;

        if($session->save()){

            //create session results

            foreach($data->results as $module){

                foreach($module->submodules as $submod ){

                    $result = new AssessmentResult;
                    $result->value = $submod->value;
                    $result->assessment_session_id = $session->id;
                    $result->submodule_id = $submod->id;
                    $result->save();

                }
            }

            foreach($arr_path as $path){

                $image = new Image;
                $image->path = $path;
                $image->assessment_session_id = $session->id;
                $image->save();

            }


        }


        Log::info($data->patient_id);

        return response()->json(["msg"=>"success","request" =>$request],201);
    }


}
