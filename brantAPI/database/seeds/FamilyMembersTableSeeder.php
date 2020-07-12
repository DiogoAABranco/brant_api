<?php

use Illuminate\Database\Seeder;
use App\FamilyMember;

class FamilyMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FamilyMember::truncate();

        FamilyMember::create(['type' => 'pai']);
        FamilyMember::create(['type' => 'mãe']);
        FamilyMember::create(['type' => 'esposo/a']);
        FamilyMember::create(['type' => 'filho']);
        FamilyMember::create(['type' => 'filha']);


    }
}
