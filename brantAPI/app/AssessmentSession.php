<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentSession extends Model
{
    //
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function patient(){

        return $this->belongsTo(Patient::class);
    }

    public function assessmentTool(){

        return $this->belongsTo(AssessmentTool::class);
    }
    public function results(){

        return $this->hasMany(AssessmentResult::class);
    }
}
