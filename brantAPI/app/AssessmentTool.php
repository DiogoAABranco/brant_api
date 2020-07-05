<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentTool extends Model
{
    //
    public function assessmentSessions(){

        return $this->hasMany(AssessmentSession::class);
    }

    public function modules(){

        return $this->hasMany(Module::class);
    }
}
