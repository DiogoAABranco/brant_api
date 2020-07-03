<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileByDomains extends Model
{
    //
    public function domains(){

        return $this->belongsToMany(Domain::class,'domain_profile_by_domains');
    }

    public function game(){

        return $this->belongsTo(Game::class);
    }
}
