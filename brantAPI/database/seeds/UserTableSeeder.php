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
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Luis Gonçalves',
            'email' => 'luis@teste.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'User Tests',
            'email' => 'utilizador1@teste.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);

    }
}
