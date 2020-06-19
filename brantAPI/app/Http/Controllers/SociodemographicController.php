<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Patient;
use App\SociodemographicData;
use App\FamilyMember;


class SociodemographicController extends Controller
{
    //
    public function show($id){
        //return sociodemographic info of one patient
        $patient = Patient::findOrFail($id);
        $sd_data = $patient->sociodemographic_data;

        return response()->json($sd_data);
    }

}
