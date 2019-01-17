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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'father_name' => "xxxx",
            'cnic' => bcrypt('password'),
            'dob' => bcrypt('password'),
            'address' => bcrypt('password'),
            'contact' => bcrypt('password'),
            'blood_group' => bcrypt('password'),
            'joining_code' => bcrypt('password'),
            'joining_date' => Carbon\Carbon::now(),
            'nominee' => bcrypt('password'),
            'nominee_cnic' => bcrypt('password'),
            'nominee_contact' => bcrypt('password'),
            'slip_number' => bcrypt('password'),
            'role' => 'admin',
            'amount' => 40000,
            'points' => 40000,
            'sponsor_code' => mt_rand(100000,999999),
        ]);
    }
}
