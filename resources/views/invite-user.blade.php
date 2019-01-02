<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 12/19/2018
 * Time: 6:28 PM
 */
?>
@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invite User
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Invite New Member</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="post" action="/add-user" >
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Member Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="cnic">CNIC Number</label>
                                    <input type="text" name="cnic" class="form-control" id="cnic" placeholder="CNIC Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="text" class="form-control" name="dob" id="dob" placeholder="Date Of Birth" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Permenent Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="90" rows="5" required></textarea>
                                </div><div class="form-group">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" required>
                                </div><div class="form-group">
                                    <label for="sponsor_code">Sponsor's Code</label>
                                    <input type="text" class="form-control" name="sponsor_code" id="sponsor_code" placeholder="Sponsors Code" required>
                                </div><div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" class="form-control" name="blood_group" id="blood_group" placeholder="Blood Group" required>
                                </div><div class="form-group">
                                    <label for="joining_code">Joining Code</label>
                                    <input type="text" class="form-control" name="joining_code" id="joining_code" value="" placeholder="Nominee Name" required>
                                </div><div class="form-group">
                                    <label for="joining_date">Joining Date</label>
                                    <input type="text" class="form-control" name="joining_date" id="joining_date" placeholder="Nominee Name" required>
                                </div><div class="form-group">
                                    <label for="nominee">Nominee Name</label>
                                    <input type="text" class="form-control" name="nominee" id="nominee" placeholder="Nominee Name" required>
                                </div><div class="form-group">
                                    <label for="nomineecnic">Nominee CNIC</label>
                                    <input type="text" class="form-control" name="nomineecnic" id="nomineecnic" placeholder="Nominee CNIC" required>
                                </div><div class="form-group">
                                    <label for="nominee_contact">Nominee Contact</label>
                                    <input type="text" class="form-control" name="nominee_contact" id="nominee_contact" placeholder="Nominee Contact" required>
                                </div><div class="form-group">
                                    <label for="slip_number">Slip Number</label>
                                    <input type="text" class="form-control" name="slip_number" id="slip_number" placeholder="Slip Number" required>
                                </div><div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="points">Points</label>
                                    <input type="text" class="form-control" name="points" id="points" placeholder="Points" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="new-user-pwd">Password</label>
                                    <input type="text" class="form-control" id="new-user-pwd" name="pwd" placeholder="Password" required>
                                    <button type="button" class="btn btn-warning" id="generate-pwd" style="margin-top: 5px;">Generate Password</button>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
    $(document).ready(function () {

        var pwd = Math.random().toString(36).slice(-8);
        console.log(pwd);
        $('#joining_code').val(pwd);
    });
</script>
@endsection

