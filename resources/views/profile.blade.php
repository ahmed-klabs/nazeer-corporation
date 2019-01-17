@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Dashboard--}}
                {{--<small>it all starts here</small>--}}
            {{--</h1>--}}
        {{--</section>--}}
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User Profile</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="main-tbl">
                            <table class="table table-striped">
                                <tr>
                                    <td>Name</td>
                                    <td>{{$userDetail['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Points</td>
                                    <td>{{$userDetail['points']}}</td>
                                </tr>
                                <tr>
                                    <td>Percentage</td>
                                    <td>{{ "xyz %" }}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$userDetail['amount']}}</td>
                                </tr>
                                <tr>
                                    <td>No Of Customer Under You</td>
                                    <td>{{ $childCount }}</td>
                                </tr>
                                <tr>
                                    <td>Your Percentage From Customer</td>
                                    <td>{{ "xyz %" }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="sub-tbl">
                            <table class="table table-striped">
                                <tr>
                                    <td><b>Total Percentage</b></td>
                                    <td>{{ "xyz%" }}</td>
                                </tr>
                                <tr>
                                    <td><b>Total Amount</b></td>
                                    <td>{{ "xyz PKR" }}</td>
                                </tr>
                                <tr>
                                    <td><b>Date Of Checque</b></td>
                                    <td>{{ $userDetail->joining_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-image">
                            <img src="{{ asset('images/max-rehkopf.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <style>
        .main-tbl{
            width: 450px;
        }
        .sub-tbl{
            margin-top: 100px;
            width: 250px;
        }
        .profile-image{
            width: 210px;
            margin: 0 auto;
        }
        .profile-image img{
            max-width: 200px;
            border-radius: 50%;
            border: 1px solid #888;
        }
    </style>
@endsection
