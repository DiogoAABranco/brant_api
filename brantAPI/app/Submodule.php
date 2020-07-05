<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submodule extends Model
{
    //

    public function module(){

        return $this->belongsTo(Module::class);
    }

    public function assessmentResults(){

        return $this->hasMany(AssessmentResult::class);
    }
}
