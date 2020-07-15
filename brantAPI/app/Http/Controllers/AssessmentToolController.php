<?php

namespace App\Http\Controllers;

use App\AssessmentTool;
use App\Module;
use App\Submodule;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;


class AssessmentToolController extends Controller
{
    //

    public function index(){

        $assessment_tools = AssessmentTool::all();

        foreach($assessment_tools as $tool){

            $tool->modules;

            foreach($tool->modules as $module){

                $module->submodules;

            }

        }

        return response()->json($assessment_tools);

    }

    public function show($id){

        $assessment_tool = AssessmentTool::findOrFail($id);

        foreach($assessment_tool->modules as $module){

            $module->submodules;

        }
        return response()->json($assessment_tool);

    }

    public function store(Request $request){

        try{
            $assessment_tool = new AssessmentTool;

            $assessment_tool->name = $request->name;

            $assessment_tool->description = $request->description;

            $modules = $request->modules;



            if($assessment_tool->save()){

                foreach($modules  as $module){

                    $newModule = new Module;

                    Log::info($module['name']);

                    $newModule->name = $module['name'];

                    $newModule->assessment_tool_id = $assessment_tool->id;

                    if($newModule->save()){

                        if(count($module['submodules']) > 0){

                            foreach($module['submodules'] as $submodule){

                                $newSubmodule = new Submodule;

                                $newSubmodule->name = $submodule['name'];

                                $newSubmodule->type = 'numeric';

                                if($submodule['stateValues']){

                                    $newSubmodule->min_value = $submodule['minValue'];

                                    $newSubmodule->max_value = $submodule['maxValue'];
                                }

                                $newSubmodule->module_id = $newModule->id;

                                $newSubmodule->save();

                            }
                        }
                    }
                }
            }
            return response()->json([$assessment_tool],201);
        }
        catch(\Exception $e){

            Log::info($e);

            return response()->json([ "message" => "can not save new tool"], 500);
        }





    }
}
