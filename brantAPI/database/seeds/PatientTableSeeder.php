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
            'name' => 'Maria Silva',
            'email' => 'maria@teste.com',
            'address' => 'Rua número 1',
            'is_active' => true
        ]);

        SociodemographicData::create([
            'date_of_birth' => date("1970/02/21"),
            'job' => 'Professor',
            'gender' => 1,
            'education_level_id' => 6,
            'patient_id' => 1
        ]);

        Patient::create([
            'name' => 'João Gomes',
            'email' => 'joao@teste.com',
            'address' => 'Rua número 2',
            'is_active' => true
        ]);

       SociodemographicData::create([
            'date_of_birth' => date("1980/05/29"),
            'job' => 'Cozinheiro',
            'gender' => 2,
            'education_level_id' => 1,
            'patient_id' => 2
        ]);

        SociodemographicData::find(1)->familyMembers()->attach(FamilyMember::find([2,3]));
        SociodemographicData::find(2)->familyMembers()->attach(FamilyMember::find([1,2,3]));


        Patient::create([
            'name' => 'Fernanda Santos',
            'email' => 'fernanda@teste.com',
            'address' => 'Rua número 3',
            'is_active' => true
        ]);

        SociodemographicData::create([
            'date_of_birth' => date("1954/10/21"),
            'job' => 'Reformada',
            'gender' => 1,
            'education_level_id' => 2,
            'patient_id' => 3
        ]);
        SociodemographicData::find(3)->familyMembers()->attach(FamilyMember::find([3,4]));



        Patient::create([
            'name' => 'Francisco Silva',
            'email' => 'fs@teste.com',
            'address' => 'Rua número 4',
            'is_active' => true
        ]);

       SociodemographicData::create([
            'date_of_birth' => date("1967/05/29"),
            'job' => 'Professor',
            'gender' => 2,
            'education_level_id' => 6,
            'patient_id' => 4
        ]);

        SociodemographicData::find(4)->familyMembers()->attach(FamilyMember::find([3,4,5]));
    }
}
