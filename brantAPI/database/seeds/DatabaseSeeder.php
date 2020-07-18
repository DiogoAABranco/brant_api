<?php

use App\Score;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        Score::truncate();

        $this->call(DomainTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FamilyMembersTableSeeder::class);
        $this->call(PatientTableSeeder::class);
        $this->call(ClinicalInfoTableSeeder::class);
        $this->call(GamesTableSeeder::class);
        $this->call(TrainingProgramTableSeeder::class);
        $this->call(ScoreTypeTableSeeder::class);
        $this->call(AssessmentToolTableSeeder::class);
        $this->call(AssessmentSessionTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
