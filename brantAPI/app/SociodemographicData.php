<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SociodemographicData extends Model
{
    //

    public function familyMembers(){

        return $this->belongstoMany(FamilyMember::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
