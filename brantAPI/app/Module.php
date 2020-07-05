<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //

    public function assessmentTool(){

        return $this->belongsTo(AssessmentTool::class);
    }

    public function submodules(){

        return $this->hasMany(Submodule::class);
    }
}
