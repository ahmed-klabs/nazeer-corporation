@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User Detail</h3>
                </div>
                <div class="box-body">
                    <div class="" style="display: none;">
                        <div class="main-tbl" style="">

                        </div>

                    </div>
                    <div class="col-md-12">
                        @if($ispaid < 1 && \Illuminate\Support\Facades\Auth::user()->role == "admin")
                            <a href="/user/{{$userData['id']}}/cheque-paid" class="btn btn-danger" style="float: right; margin-top: 10px; margin-bottom: 10px;">Cheque Paid</a>
                        @endif
                            <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Profile Detail</a></li>
                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Bonus Detail</a></li>
                                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Cheque / Transcation Detail</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            <strong>Success!</strong> Profile has been Updated.
                                        </div>
                                    @endif
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Rank</td>
                                            <td>
                                                @if($userData['rank'] == 1)
                                                    Sales Officer
                                                @elseif($userData['rank'] == 2)
                                                    Asst. Sales Officer
                                                @elseif($userData['rank'] == 3)
                                                    Deputy Sales Officer
                                                @elseif($userData['rank'] == 4)
                                                    Sales Manager
                                                @elseif($userData['rank'] == 5)
                                                    Executive Sales Manager
                                                @elseif($userData['rank'] == 6)
                                                    Asst. General Manager
                                                @elseif($userData['rank'] == 7)
                                                    Deputy General Manager
                                                @elseif($userData['rank'] == 8)
                                                    General Manager
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$userData['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Father / Husband Name</td>
                                            <td>{{$userData['father_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$userData['email']}}</td>
                                        </tr>
                                        <tr>
                                            <td>CNIC</td>
                                            <td>{{$userData['cnic']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Birth</td>
                                            <td>{{$userData['dob']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$userData['address']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td>{{$userData['contact']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Blood group</td>
                                            <td>{{$userData['blood_group']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Joining Code</td>
                                            <td>{{$userData['joining_code']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Joining Date</td>
                                            <td>{{$userData['joining_date']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nominee</td>
                                            <td>{{$userData['nominee']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nominee CNIC</td>
                                            <td>{{$userData['nominee_cnic']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td>{{$userData['amount']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Points</td>
                                            <td>{{$userData['points']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Filer</td>
                                            <td>{{$userData['filer']}}</td>
                                        </tr>
                                        @if(!Auth()->user()->role == "admin")
                                            <tr>
                                                <td>Sponser Code</td>
                                                <td>{{$userData['sponsor_code']}}</td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">

                                    <table class="table table-bordered table-striped table-hovered">
                                        <tr>
                                            <td><b>Percentage</b></td>
                                            <td>{{$userData['direct_bonus_percentage'] + $userData['link_bonus_percentage'] + $userData['matching_bonus_percentage'] ."%" }}</td>
                                        </tr>

                                        <tr>
                                            <td><b> 5% Direct Amount</b></td>
                                            <td>{{"Rs. " . $userData['direct_amount']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Direct Line</b></td>
                                            <td>{{"Rs. " . $userData['direct_line_amount']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>In-Direct Line</b></td>
                                            <td>{{"Rs. " . $userData['in_direct_line_amount']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Matching Bonus</b></td>
                                            <td>{{"Rs. " . $userData['matching_bonus_amount']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Total Amount First Month</b></td>
                                            <td>{{"RS. " . $bonusDetail['total_amount'] }}</td>
                                        </tr>

                                        <tr>
                                            <td><b>All Taxes Deduction</b></td>
                                            <td>{{"RS. " . $bonusDetail['tax_deduction']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Computer Fee</b></td>
                                            <td>{{"RS. " . $bonusDetail['computer_fee'] }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Amount to be paid</b></td>
                                            <td>{{"RS. " . $bonusDetail['amount_to_be_paid']}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Date Of Cheque</b></td>
                                            <td>{{ $dateOfCheck  }}</td>
                                        </tr>
                                        {{--<tr>--}}
                                            {{--<td><b>Last Month Cheque</b></td>--}}
                                            {{--<td>{{ "RS. ". $lastMonthCheckAmount  }}</td>--}}
                                        {{--</tr>--}}

                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Detail</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($accounts) && count($accounts)>0)
                                            @foreach($accounts as $account)

                                                <tr style="background: {{ $account['type'] == "DEBIT" ? '#8bc34a9e' : '#ff000057' }}">
                                                    <td>{{ $account['detail'] }}</td>
                                                    <td>{{ $account['amount'] }}</td>
                                                    <td>{{ $account['type'] }}</td>
                                                    <td><?php $createdAt = \Carbon\Carbon::parse($account['created_at']); echo $createdAt->format('M d Y')?></td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
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
