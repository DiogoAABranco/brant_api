<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function type(){

        return $this->belongsTo(ScoreType::class);
    }
    public function session(){

        return $this->belongsTo(Session::class);
    }
}
