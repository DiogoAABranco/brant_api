<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\SociodemographicData;

class PatientController extends Controller
{
    //
    public function index(){

        $patient = new Patient;
        $patient->name = "luis";
        $patient->email = "luis@teste.com";
        $patient->address = "minha morada";
        $patient->is_active = true;

        $patient->save();

        $sd_data = new SociodemographicData;
        $sd_data->date_of_birth = date("Y/m/d");
        $sd_data->job = "estudante";
        $sd_data->gender = "0";
        $sd_data->date_of_birth = date("Y/m/d");
        $sd_data->education_level_id = 1;
        $patient->sociodemographic_data()->save($sd_data);


    }
    public function get(){
        $patient = Patient::find(1);
        var_dump($patient->name);



        $patient = SociodemographicData::find(1)->patient;
        dd($patient);



    }
}
