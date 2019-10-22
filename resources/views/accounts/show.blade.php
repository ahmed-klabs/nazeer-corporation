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
                            <th>Detail</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($accounts) && count($accounts)>0)
                            @foreach($accounts as $account)

                                <tr style="background: {{ $account['type'] == "DEBIT" ? '#8bc34a9e' : '#ff000057' }}">
                                    <td>{{ $account['detail'] }}</td>
                                    <td>{{ $account['type'] }}</td>
                                    <td><?php $createdAt = \Carbon\Carbon::parse($account['created_at']); echo $createdAt->format('M d Y')?></td>
                                    <td>{{ $account['amount'] }}</td>

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
