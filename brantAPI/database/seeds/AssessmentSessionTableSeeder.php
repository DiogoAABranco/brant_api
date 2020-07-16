<?php

use App\AssessmentResult;
use App\AssessmentSession;
use App\AssessmentTool;
use App\Image;
use Illuminate\Database\Seeder;

class AssessmentSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AssessmentSession::truncate();
        AssessmentResult::truncate();
        Image::truncate();

        AssessmentSession::create([
            "date" => date("Y/m/d"),
            "patient_id" => 1,
            "user_id" => 1,
            "assessment_tool_id" => 1
        ]);

        $modules = AssessmentTool::find(1)->modules;

        foreach($modules as $module){

            if($module->submodules != null){

                foreach($module->submodules as $submod){

                    if($submod->min_value === null || $submod->max_value === null){
                        AssessmentResult::create([
                            "value" => rand(0,8),
                            "assessment_session_id" =>1,
                            "submodule_id" => $submod->id
                        ]);
                    }
                    else{
                        AssessmentResult::create([
                            "value" => rand($submod->min_value,$submod->max_value),
                            "assessment_session_id" =>1,
                            "submodule_id" => $submod->id
                        ]);
                    }

                }

            }
        }
    }
}
