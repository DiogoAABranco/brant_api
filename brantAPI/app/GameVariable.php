<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameVariable extends Model
{
    //
    protected $guarded = [];
    public function trainingProgram(){

        return $this->belongsTo(TrainingProgram::class);
    }
    public function game(){

        return $this->belongsTo(Game::class);
    }
    public function variableType(){

        return $this->belongsTo(GameVariableType::class);
    }

}
