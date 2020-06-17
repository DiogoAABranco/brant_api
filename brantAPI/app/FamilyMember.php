<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    //
    public function sociodemographics(){

        return $this->belongsToMany(SociodemographicData::class);
    }
}
