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
                    <h3 class="box-title">Home</h3>
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
                                    <td>{{ $rank }}</td>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <td>{{ $userCode }}</td>
                                </tr>
                                <tr>
                                    <td>Total Points</td>
                                    <td>{{ $totalPoints }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <img src="{{ asset('images/neisp.png') }}" style="width:500px;height: auto;">
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
