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
                                    <td>{{$userData['name']}}</td>
                                </tr>
                                <tr>
                                    <td>Total Points</td>
                                    <td>{{ $totalPoints }}</td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td>{{"PKR " . $totalAmount}}</td>
                                </tr>
                                <tr>
                                    <td>No Of Customer Under You</td>
                                    <td>{{ $totalCustomers }}</td>
                                </tr>
                                <tr>
                                    <td>Direct Bonus</td>
                                    <td>{{ 5 .  "%" }}</td>
                                </tr>
                                <tr>
                                    <td>Link Bonus</td>
                                    <td>{{ $customerPercentage .  "%" }}</td>
                                </tr>
                                <tr>
                                    <td>Matching Bonus</td>
                                    <td>{{ $matchingBonus .  "%" }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="sub-tbl">
                            <table class="table table-striped">
                                <tr>
                                    <td><b>Percentage</b></td>
                                    <td>{{ $totalPercentage . "%" }}</td>
                                </tr>
                                <tr>
                                    <td><b>Amount to be paid first month</b></td>
                                    <td>{{ "PKR " . ($totalAmount * ($totalPercentage + $matchingBonus) ) / 100 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Amount to be paid after first month</b></td>
                                    <td>{{ "PKR " . ($totalAmount * $totalPercentage ) / 100 }}</td>
                                </tr>
                                <tr>
                                    <td><b>Date Of Checque</b></td>
                                    <td>{{ $dateOfCheck  }}</td>
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
