<?php

use Illuminate\Database\Seeder;
use App\ClinicalInfoType;

class ClinicalInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ClinicalInfoType::truncate();

        ClinicalInfoType::create(['type' => 'medicação']);
        ClinicalInfoType::create(['type' => 'procedimento clínico']);
    }
}
