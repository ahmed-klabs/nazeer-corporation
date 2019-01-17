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
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'father_name' => "",
            'cnic' => "00000-0000000-0",
            'dob' => "20/05/1990",
            'address' => "House # 123",
            'contact' => "0346-1234567",
            'blood_group' => "A+",
            'joining_code' => mt_rand(100000,999999),
            'joining_date' => Carbon\Carbon::now(),
            'nominee' => "Admin",
            'nominee_cnic' => "00000-0000000-0",
            'nominee_contact' => "0346-7654321",
            'slip_number' => "00255",
            'role' => 'admin',
            'amount' => 40000,
            'points' => 40,
            'sponsor_code' => 'admin',
        ]);
    }
}
