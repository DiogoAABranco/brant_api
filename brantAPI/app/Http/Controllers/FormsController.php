<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FamilyMember;
use App\EducationLevels;
use App\ClinicalInfoType;

class FormsController extends Controller
{
    //
    public function patientForm(){
        $educatio_levels =EducationLevels::all();
        $family_members  =FamilyMember::all();

        return response()->json(['educationLevels' => $educatio_levels,'familyMembers' => $family_members]);
    }
    public function clinicalInfo(){
        $types = ClinicalInfoType::all();

        return response()->json(['types'=>$types]);
    }

}
