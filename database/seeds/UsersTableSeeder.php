<?php

use Illuminate\Database\Seeder;

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
                'full_name' => 'EJhay Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'phone' => '09122960911',
                'address' => 'Lucap Alaminos Pangasinan',
                'role' => 'admin'
            ],

            //customer
            [
                'full_name' => 'EJhay Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('customer'),
                'phone' => '09959423520',
                'address' => 'Lucap Alaminos Pangasinan',
                'role' => 'customer'
            ]
        ]);
    }
}
