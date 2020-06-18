<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Patient;
use App\SociodemographicData;
use App\FamilyMember;


class PatientController extends Controller
{
    //
    public function index(){

        $patients = Patient::all();

        return response()->json($patients);
    }


    public function show($id){

        $patient = Patient::findOrFail($id);

        return response()->json($patient);
    }


    public function store(Request $request){

        $patient = new Patient;

        $validator = Validator::make($request->all(),([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email',
            'address' => 'required'
        ]));

        if($validator->fails())
            return response()->json(['errors' => $validator->errors()],401);


        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->is_active = 1;

        if($patient->save())
            return response()->json([ "message" => "patient record created"], 201);
        else
            return response()->json([ "message" => "patient not created"], 500);
    }

    public function update(Request $request, $id){

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return response()->json($patient, 200);

    }
    public function destroy($id){

        $patient = Patient::findOrFail($id)->delete();

        return response()->json(null, 204);

    }
}
// $patient = new Patient;
        // $patient->name = "maria";
        // $patient->email = "maria@teste.com";
        // $patient->address = "maria morada";
        // $patient->is_active = true;

        // $patient->save();

        // $sd_data = new SociodemographicData;
        // $sd_data->date_of_birth = date("Y/m/d");
        // $sd_data->job = "padeiro";
        // $sd_data->gender = "1";
        // $sd_data->education_level_id = 1;
        // $family_members = FamilyMember::find([2,3]);




        // $patient->sociodemographic_data()->save($sd_data);
        // $sd_data->familyMembers()->attach($family_members);
        // dd($sd_data->familyMembers);
//------------------------------------------------
 //$patient = Patient::find(1);
        //echo($patient->name);
        //dd($patient->sociodemographic_data);
        //dd($patient->sociodemographic_data->familyMembers);



        //$patient = SociodemographicData::find(1)->patient;
        //dd($patient);

