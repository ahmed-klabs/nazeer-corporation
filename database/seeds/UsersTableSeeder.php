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
        $data = array(
            array(
                'name' => 'Super Admin',
                'email' => 'admin@nc.com',
                'password' => bcrypt('password'),
                'father_name' => "",
                'cnic' => "00000-0000000-0",
                'dob' => "20/05/1990",
                'address' => "House # 123",
                'contact' => "0346-1234567",
                'filer' => "non-filer",
                'blood_group' => "A+",
                'joining_code' => '00001',
                'joining_date' => Carbon\Carbon::now(),
                'nominee' => "Admin",
                'nominee_cnic' => "00000-0000000-0",
                'nominee_contact' => "0346-7654321",
                'slip_number' => "00001",
                'role' => 'admin',
                'amount' => 0,
                'points' => 0,
                'sponsor_code' => 'admin',
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ),
            array(
                'name' => 'Operator',
                'email' => 'operator@nc.com',
                'password' => bcrypt('password'),
                'father_name' => "",
                'cnic' => "00000-0000000-0",
                'dob' => "20/05/1990",
                'address' => "House # 123",
                'contact' => "0346-1234567",
                'filer' => "non-filer",
                'blood_group' => "A+",
                'joining_code' => '00001',
                'joining_date' => Carbon\Carbon::now(),
                'nominee' => "Admin",
                'nominee_cnic' => "00000-0000000-0",
                'nominee_contact' => "0346-7654321",
                'slip_number' => "00001",
                'role' => 'operator',
                'amount' => 0,
                'points' => 0,
                'sponsor_code' => 'admin',
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            )
        );
        DB::table('users')->insert($data);
    }
}
