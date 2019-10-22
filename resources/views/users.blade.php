@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

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
                            <th>Total Points</th>
                            <th>Filer</th>
                            <th>Sponsor Code</th>
                            <th>Option</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users) && count($users)>0)
                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['contact'] }}</td>
                                    <td>{{ $user['cnic'] }}</td>
                                    <td>{{ $user['joining_code'] }}</td>
                                    <td>{{ $user['joining_date'] }}</td>
                                    <td>{{ $user['points'] }}</td>
                                    <td>{{ $user['total_points'] }}</td>
                                    <td>{{ $user['filer'] }}</td>
                                    <td>{{ $user['sponsor_code'] }}</td>
                                    <td style="display: inline-flex">
                                        <a class="btn btn-warning btn-xs" href="/user/{{$user['id']}}">Profile</a>
                                        <a class="btn btn-primary btn-xs" style="margin-left: 10px;" href="/user_dashboard/{{ $user['id'] }}">Lines</a>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == "admin")
                                            <a class="btn btn-danger btn-xs" style="margin-left: 10px;" href="/user/{{ $user['id'] }}/edit">Edit</a>
                                        @endif
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
