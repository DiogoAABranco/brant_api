<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameVariableType extends Model
{
    //
    public $timestamps = false;

    public function gamesVariables(){

        return $this->hasMany(GameVariable::class);
    }

    public function games(){

        return $this->belongsToMany(Game::class);
    }
}
