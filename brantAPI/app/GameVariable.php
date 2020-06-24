<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameVariable extends Model
{
    //
    public function session(){

        return $this->belongsTo(Session::class);
    }
    public function game(){

        return $this->belongsTo(Game::class);
    }
    public function variableType(){

        return $this->belongsTo(GameVariableType::class);
    }

}
