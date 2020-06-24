<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    public function games(){
        return $this->hasMany(Game::class);
    }

    public function gamesVariables(){

        return $this->hasMany(GameVariable::class);
    }
}
