@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Accounts</h3>

                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Points</th>
                            <th>Rank</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Detail</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($accounts) && count($accounts)>0)
                            @foreach($accounts as $account)

                                <tr style="background: {{ $account['type'] == "DEBIT" ? '#8bc34a9e' : '#ff000057' }}">
                                    <td>
                                        <a href="/accounts/user/{{$account['user_id']}}">{{ $account['user']['name'] }}</a>
                                    </td>
                                    <td>{{ $account['user']['points'] }}</td>
                                    <td>
                                        @if($account['user']['rank'] == 1)
                                            Sales Officer
                                        @elseif($account['user']['rank'] == 2)
                                            Asst. Sales Officer
                                        @elseif($account['user']['rank'] == 3)
                                            Deputy Sales Officer
                                        @elseif($account['user']['rank'] == 4)
                                            Sales Manager
                                        @elseif($account['user']['rank'] == 5)
                                            Executive Sales Manager
                                        @elseif($account['user']['rank'] == 6)
                                            Asst. General Manager
                                        @elseif($account['user']['rank'] == 7)
                                            Deputy General Manager
                                        @elseif($account['user']['rank'] == 8)
                                            General Manager
                                        @endif
                                    </td>
                                    <td>{{ $account['amount'] }}</td>
                                    <td>{{ $account['type'] }}</td>
                                    <td>{{ $account['detail'] }}</td>
                                    <td><?php $createdAt = \Carbon\Carbon::parse($account['created_at']); echo $createdAt->format('M d Y')?></td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
