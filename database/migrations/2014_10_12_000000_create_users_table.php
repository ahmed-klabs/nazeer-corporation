<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('father_name');
            $table->string('cnic');
            $table->string('dob');
            $table->text('address');
            $table->string('contact');
            $table->string('sponsor_code');
            $table->string('blood_group');
            $table->string('joining_code');
            $table->date('joining_date');
            $table->string('nominee');
            $table->string('nominee_cnic');
            $table->string('nominee_contact');
            $table->string('slip_number');
            $table->string('role');
            $table->integer('amount');
            $table->integer('points');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
