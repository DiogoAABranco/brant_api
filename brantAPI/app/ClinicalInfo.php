<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class ClinicalInfo extends Model
{
    //
    public function clinicalInfoType(){

        return $this->hasOne(ClinicalInfoType::class);
    }

    public function patient(){

        return $this->belongsTo(Patient::class);
    }
}
