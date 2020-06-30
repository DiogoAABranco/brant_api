<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function gameVariables(){

        return $this->hasMany(GameVariable::class);
    }
    public function sessions(){

        return $this->belongsToMany(Session::class);
    }
    public function gameVariableType(){

        return $this->belongsToMany(GameVariableType::class);
    }
    public function scores(){

        return $this->hasMany(Score::class);
    }
}
