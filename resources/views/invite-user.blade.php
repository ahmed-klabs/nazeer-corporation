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
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Member Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Father Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Father Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">CNIC Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="CNIC Number">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date Of Birth</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Date Of Birth">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Permenent Address</label>
                                    <textarea class="form-control" id="exampleInputEmail1" cols="90" rows="5"></textarea>
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Contact Number">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Sponsor's Code</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Sponsors Code">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Blood Group</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Blood Group">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Nominee Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nominee Name">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Nominee CNIC</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nominee CNIC">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Nominee Contact</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nominee Contact">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Slip Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slip Number">
                                </div><div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Amount">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Points</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Points">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password">
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
@endsection

