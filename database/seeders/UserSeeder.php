<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' =>  'admin@gmail.com',
            'email_verified_at' =>  NULL,
            'password'  =>  Hash::make('12345678'),
            'role_id'  =>  '1',
            'remember_token'  =>  NULL,
            'status' => '1',
        ]);

       
    }
}
