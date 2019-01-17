@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>it all starts here</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Users</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>{{$userDetail['name']}}</td>
                            </tr>
                            <tr>
                                <td>Father Name</td>
                                <td>{{$userDetail['name']}}</td>
                            </tr>
                            <tr>
                                <td>CNIC</td>
                                <td>{{$userDetail['cnic']}}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{$userDetail['dob']}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$userDetail['address']}}</td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td>{{$userDetail['contact']}}</td>
                            </tr>
                            <tr>
                                <td>Sponsor Code</td>
                                <td>{{$userDetail['sponsor_code']}}</td>
                            </tr>
                            <tr>
                                <td>Blood Group</td>
                                <td>{{$userDetail['blood_group']}}</td>
                            </tr>
                            <tr>
                                <td>Joining Code</td>
                                <td>{{$userDetail['joining_code']}}</td>
                            </tr>
                            <tr>
                                <td>Joining Date</td>
                                <td>{{$userDetail['joining_date']}}</td>
                            </tr>
                            <tr>
                                <td>Nominee Name</td>
                                <td>{{$userDetail['nominee']}}</td>
                            </tr>
                            <tr>
                                <td>Nominee CNIC</td>
                                <td>{{$userDetail['nominee_cnic']}}</td>
                            </tr>
                            <tr>
                                <td>Nominee Contact</td>
                                <td>{{$userDetail['nominee_contact']}}</td>
                            </tr>
                            <tr>
                                <td>Slip Number</td>
                                <td>{{$userDetail['slip_number']}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$userDetail['email']}}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>{{$userDetail['amount']}}</td>
                            </tr>
                            <tr>
                                <td>Points</td>
                                <td>{{$userDetail['points']}}</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <a class="btn btn-info" href="/home">Back</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <img src="{{ asset('images/max-rehkopf.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
