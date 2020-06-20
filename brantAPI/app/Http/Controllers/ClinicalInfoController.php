<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\ClinicalInfo;
use App\ClinicalInfoType;
use Validator;
use Illuminate\Support\Facades\Log;

class ClinicalInfoController extends Controller
{
    //
    public function index($id){

        try{
           $patient = Patient::findOrFail($id);
            return response()->json($patient->clinicalInfo);
        }
        catch(\Exception $e){
            return response()->json([ "message" => "can not get clinical info"], 500);
        }


    }

    public function store(Request $request, $id){

        $patient = Patient::findOrFail($id);

        $validator = Validator::make($request->all(),([
            'description' => 'required|string|max:500',
            'date' => 'required|date|date_format:Y-m-d',
            'clinical_info_type_id' => 'required',
        ]));

        if($validator->fails()){
            Log::info('validator falhou clinical info: '.$validator->errors());
            return response()->json(['errors' => $validator->errors()],401);
        }

        $clinical_info = new ClinicalInfo;
        $clinical_info->description = $request->description;
        $clinical_info->date = $request->date;
        $clinical_info->clinical_info_type_id = $request->clinical_info_type_id;

        $patient->clinicalInfo()->save($clinical_info);

        return response()->json(["message" =>"success", "added"=>$patient->clinicalInfo],201);
    }

    public function update(Request $request, $id){

        try{

            $clinical_info = ClinicalInfo::findOrFail($id);
            $clinical_info->update($request->all());

            return response()->json((["message"=>"success","updated_info"=> $clinical_info]), 200);

        }catch(\Exception $e){
            Log::info($e);
            return response()->json([ "message" => "impossible to update"], 500);
        }


    }
    public function destroy($id){

        try{
            $clinical_info = ClinicalInfo::findOrFail($id)->delete();

            return response()->json(null, 204);
        }
        catch(\Exception $e){
            Log::info($e);
            return response()->json([ "message" => "impossible to delete"], 500);
        }


    }
}
