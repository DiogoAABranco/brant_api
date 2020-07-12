<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Patient;
use App\SociodemographicData;
use App\FamilyMember;
use App\EducationLevels;


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
        EducationLevels::truncate();

        EducationLevels::create([
            'type' => 'nenhum',
        ]);
        EducationLevels::create([
            'type' => '1 Ciclo',
        ]);
        EducationLevels::create([
            'type' => '2 Ciclo',
        ]);
        EducationLevels::create([
            'type' => '3 Ciclo',
        ]);
        EducationLevels::create([
            'type' => 'Secundário',
        ]);
        EducationLevels::create([
            'type' => 'Ensino Superior',
        ]);

        Patient::create([
            'name' => 'maria',
            'email' => 'maria@teste.com',
            'address' => 'maria morada',
            'is_active' => true
        ]);

        SociodemographicData::create([
            'date_of_birth' => date("1970/02/21"),
            'job' => 'professor',
            'gender' => 2,
            'education_level_id' => 2,
            'patient_id' => 1
        ]);

        Patient::create([
            'name' => 'luis',
            'email' => 'luis@teste.com',
            'address' => 'luis morada',
            'is_active' => true
        ]);

       SociodemographicData::create([
            'date_of_birth' => date("1980/05/29"),
            'job' => 'padeiro',
            'gender' => 2,
            'education_level_id' => 1,
            'patient_id' => 2
        ]);

        SociodemographicData::find(1)->familyMembers()->attach(FamilyMember::find([2,3]));
        SociodemographicData::find(2)->familyMembers()->attach(FamilyMember::find([1,2,3]));




    }
}
