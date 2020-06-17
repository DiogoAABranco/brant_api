<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function sociodemographic_data(){

        return $this->hasOne(SociodemographicData::class);
    }
}
