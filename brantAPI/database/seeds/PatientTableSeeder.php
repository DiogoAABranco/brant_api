<?php

use Illuminate\Database\Seeder;
use App\Patient;
use App\SociodemographicData;
use App\FamilyMember;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('patients')->delete();
        //DB::table('sociodemographic_data')->delete();
        //DB::table('family_member_sociodemographic_data')->delete();

        Patient::truncate();
        SociodemographicData::truncate();
        DB::table('family_member_sociodemographic_data')->truncate();


        Patient::create([
            'name' => 'maria',
            'email' => 'maria@teste.com',
            'address' => 'maria morada',
            'is_active' => true
        ]);

       SociodemographicData::create([
            'date_of_birth' => date("Y/m/d"),
            'job' => 'padeiro',
            'gender' => 1,
            'education_level_id' => 1,
            'patient_id' => 1
        ]);

        SociodemographicData::find(1)->familyMembers()->attach(FamilyMember::find([2,3]));




    }
}
