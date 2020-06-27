<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('users')->insert([
            'name' => 'profissional',
            'email' => Str::random(10).'@teste.com',
            'password' => Hash::make('password'),
        ]);

    }
}
