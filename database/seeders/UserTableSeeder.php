<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'uniqueid'=>'7037667193',
            'fullname'=>'Darta Super Admin',
            'email'=>'ogunmola.net@gmail.com',
            'phone'=>'07037667193',
            'gender'=>'Male',
            'status'=>'1',
            'usertype'=>'admin',
            'privilege'=>'superadmin',
            'password'=>Hash::make('ogunmola')
        ];
        
        DB::table('users')->insert($data);
    }
}
