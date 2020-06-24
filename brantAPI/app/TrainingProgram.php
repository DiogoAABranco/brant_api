<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    //
    public function patient(){

        return $this->belongsTo(Patient::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
