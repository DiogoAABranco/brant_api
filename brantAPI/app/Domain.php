<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProfileByDomains;

class Domain extends Model
{
    //
    public function domains(){

        return $this->hasMany(Domain::class);
    }

    public function domain(){

        return $this->belongsTo(Domain::class);
    }

    public function profileByDomains(){

        return $this->belongsToMany(ProfileByDomains::class,'domain_profile_by_domains');
    }


}
