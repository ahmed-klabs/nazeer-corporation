@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>NIC</th>
                            <th>Joining Code</th>
                            <th>Joining Date</th>
                            <th>Points</th>
                            <th>Sponsor Code</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($allUsers) && count($allUsers)>0)
                            @foreach($allUsers as $user)

                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['contact'] }}</td>
                                    <td>{{ $user['cnic'] }}</td>
                                    <td>{{ $user['joining_code'] }}</td>
                                    <td>{{ $user['joining_date'] }}</td>
                                    <td>{{ $user['points'] }}</td>
                                    <td>{{ $user['sponsor_code'] }}</td>
                                    <td style="display: inline-flex">
                                        <a class="btn btn-warning btn-xs" href="/user/{{$user['id']}}">Bouns</a>
                                        <a class="btn btn-primary btn-xs" style="margin-left: 10px;" href="/user_dashboard/{{ $user['id'] }}">Lines</a>
                                    </td>
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
