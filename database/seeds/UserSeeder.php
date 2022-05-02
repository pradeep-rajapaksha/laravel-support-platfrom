<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Pradeep Rajapaksha',
            'email' => 'pradeepprasanna.rajapaksha4@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('password'),
        ]);
    }
}
