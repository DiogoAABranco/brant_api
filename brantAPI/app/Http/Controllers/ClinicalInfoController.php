<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\ClinicalInfo;
use App\ClinicalInfoType;

class ClinicalInfoController extends Controller
{
    //
    public function index(){



        $clinical_info = new ClinicalInfo;
        $clinical_info->description = 'descrição desta medicação ultima';
        $clinical_info->date = date("Y/m/d");
        $clinical_info->clinical_info_type_id = 1;

        $patient = Patient::find(1);
        $patient->clinicalInfo()->save($clinical_info);


        dd($patient->clinicalInfo);
    }

    public function get(){

        $patient = Patient::find(1);
        dd($patient->clinicalInfo);
    }
}
