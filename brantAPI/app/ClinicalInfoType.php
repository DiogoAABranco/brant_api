<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClinicalInfo;

class ClinicalInfoType extends Model
{
    //
    public function ClinicalInfo(){

        return $this->belongsToMany(ClinicalInfo::class);
    }
}
