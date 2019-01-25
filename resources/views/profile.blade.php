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
                                    <td>Rank</td>
                                    <td>{{$rank}}</td>
                                </tr>
                                <tr>
                                    <td>Direct Points</td>
                                    <td>{{ $userData['points'] }}</td>
                                </tr>
                                <tr>
                                    <td>In-Direct Points</td>
                                    <td>{{ $childsPoints }}</td>
                                </tr>
                                <tr>
                                    <td>Total Points</td>
                                    <td>{{ $totalPoints }}</td>
                                </tr>
                                <tr>
                                    <td>No Of Customer Under You</td>
                                    <td>{{ $totalCustomers }}</td>
                                </tr>
                                <tr>
                                    <td>Direct Bonus</td>
                                    <td>{{ $directBonus .  "%" }}</td>
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
                                    <td><b>Total Amount</b></td>
                                    <td>{{ "Rs. " . $amountToBePaid }}</td>
                                </tr>

                                <tr>
                                    <td><b>Filer/Non-Filer Deduction</b></td>
                                    <td>{{ "Rs. " . $filerDeduction }}</td>
                                </tr>
                                <tr>
                                    <td><b>Computer Fee</b></td>
                                    <td>{{ "Rs. " . $computerFee }}</td>
                                </tr>
                                <tr>
                                    <td><b>Amount to be paid</b></td>
                                    <td>{{ "Rs. " . $amountToBePaidAfterDeduction }}</td>
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
