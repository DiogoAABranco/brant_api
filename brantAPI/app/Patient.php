<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    //
    protected $guarded = [];

    public function sociodemographic_data(){

        return $this->hasOne(SociodemographicData::class);
    }

    public function clinicalInfo(){

        return $this->hasMany(ClinicalInfo::class);
    }

    public function trainingPrograms(){

        return $this->hasMany(TrainingProgram::class);
    }

    public function assessmentSessions(){

        return $this->hasMany(AssessmentSession::class);
    }

}
