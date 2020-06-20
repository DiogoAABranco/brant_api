<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class ClinicalInfo extends Model
{
    //
    protected $guarded = [];
    public function clinicalInfoType(){

        return $this->hasOne(ClinicalInfoType::class);
    }

    public function patient(){

        return $this->belongsTo(Patient::class);
    }
}
