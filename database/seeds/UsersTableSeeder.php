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
            'father_name' => "-",
            'cnic' => "-",
            'dob' => "-",
            'address' => "-",
            'contact' => "-",
            'blood_group' => "-",
            'joining_code' => "-",
            'joining_date' => Carbon\Carbon::now(),
            'nominee' => "-",
            'nominee_cnic' => "-",
            'nominee_contact' => "-",
            'slip_number' => "-",
            'role' => 'admin',
            'amount' => 40000,
            'points' => 40000,
            'sponsor_code' => mt_rand(100000,999999),
        ]);
    }
}
