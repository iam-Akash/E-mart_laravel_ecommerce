<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //admin
            [
            'full_name'=>'ziaul Haq',
            'username'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('123456'),
            'phone'=>'01633766966',
            'role'=>'admin',
            'status'=>'active',
            ],
            //seller
            [
                'full_name'=>'Sadia Uddin',
                'username'=>'Seller',
                'email'=>'seller@gmail.com',
                'password'=> Hash::make('123456'),
                'phone'=>'01633766966',
                'role'=>'seller',
                'status'=>'active',
                ],
                //Customer
            [
                'full_name'=>'shorif uddin',
                'username'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=> Hash::make('123456'),
                'phone'=>'01633766966',
                'role'=>'customer',
                'status'=>'active',
                ],
            
        ]);
    }
}
