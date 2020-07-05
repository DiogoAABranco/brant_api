<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    //
    public function submodule(){

        return $this->belongsTo(Submodule::class);
    }

    public function assessment_session(){

        return $this->belongsTo(AssessmentSession::class);
    }
}
