<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    //
    protected $guarded = [];

    public function sociodemographic_data(){

        return $this->hasOne(SociodemographicData::class);
    }

    public function clinicalInfo(){

        return $this->hasMany(ClinicalInfo::class);
    }
}
