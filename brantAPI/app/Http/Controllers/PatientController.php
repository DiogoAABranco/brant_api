<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Validator;
use App\Patient;
use App\SociodemographicData;
use App\FamilyMember;


class PatientController extends Controller
{
    //
    public function index(){
        try{
            $patients = Patient::all();

            return response()->json($patients);
        }
        catch(\Exception $e){
            return response()->json([ "message" => "can not get patients"], 500);
        }

    }


    public function show($id){
        try{
            $patient = Patient::findOrFail($id);

            return response()->json($patient);
        }
        catch(\Exception $e){
            return response()->json([ "message" => "can not find patient"], 500);
        }
    }


    public function store(Request $request){
        Log::info('Showing patient: '.$request);
        try{
        $patient = new Patient;

        $validator = Validator::make($request->all(),([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email',
            'address' => 'required',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
            'job' => 'required|string|max:100|min:3',
            'gender' => 'required',
            'education_level_id' => 'required',
            'family_members' => 'required'
        ]));

        if($validator->fails()){
            Log::info('validator falhou: '.$validator->errors());
            return response()->json(['errors' => $validator->errors()],401);
        }

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->is_active = 1;

        $sd_data = new SociodemographicData;
        $sd_data->date_of_birth = $request->date_of_birth;
        $sd_data->job = $request->job;
        $sd_data->gender = $request->gender;
        $sd_data->education_level_id = $request->education_level_id;

        //sent string with family mebers id 2,3 then convert to array
        //$family_members_ids = explode(",", $request->family_members);
        $family_members = FamilyMember::find([$request->family_members]);




        if($patient->save()){
            Log::info('1************');
            if($patient->sociodemographic_data()->save($sd_data)){
                Log::info('2************');
                $sd_data->familyMembers()->attach($family_members);

                return response()->json([ "message" => "patient record created","fm"=>$patient->sociodemographic_data->familyMembers], 201);
            }
            else{
                Log::info('3************');
                Patient::latest()->first()->delete();
                return response()->json([ "message" => "sociodemographic_data not created"], 500);
            }
        }
        else
            return response()->json([ "message" => "patient not created"], 500);
        }catch(\Exception $e){
            Log::info('4************');
            return response()->json([ "message" => "patient not created"], 500);
        }

    }

    public function update(Request $request, $id){

        try{
            $patient = Patient::findOrFail($id);
            $patient->update($request->all());

            return response()->json($patient, 200);
        }catch(\Exception $e){
            return response()->json([ "message" => "impossible to update"], 500);
        }


    }
    public function destroy($id){

        $patient = Patient::findOrFail($id)->delete();

        return response()->json(null, 204);

    }
}
