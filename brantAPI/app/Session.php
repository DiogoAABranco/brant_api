<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    public function trainingProgram(){

        return $this->belongsTo(TrainingProgram::class);
    }

    public function gameVariables(){

        return $this->hasMany(GameVariable::class);
    }

    public function games(){

        return $this->belongsToMany(Game::class);
    }

}
