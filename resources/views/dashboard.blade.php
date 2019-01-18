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
                            <th>Sponsor Name</th>
                            <th>Sponsor Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Joining Code</th>
                            <th>Joining Date</th>
                            <th>Points</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($allUsers) && count($allUsers)>0)
                            @foreach($allUsers as $user)

                                <tr>
                                    <td>{{ $user['sponsor_name'] }}</td>
                                    <td>{{ $user['sponsor_code'] }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['contact'] }}</td>
                                    <td>{{ $user['joining_code'] }}</td>
                                    <td>{{ $user['joining_date'] }}</td>
                                    <td>{{ $user['points'] }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="/user/{{$user['id']}}">View</a>
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
