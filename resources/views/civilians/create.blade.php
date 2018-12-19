<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 12/6/2018
 * Time: 3:26 PM
 */
?>

@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Add New Civilian</h1>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div><br>
        @endif
        @if (\Session::has('create'))
            <div class="alert alert-success">
                <p>{{ \Session::get('create') }}</p>
            </div><br>
        @endif
        <div class="col-md-5" style="margin-top: 10px; margin-bottom: 10px;">
            <form method="post" action="{{ route('civilian-store') }}" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="row" style="margin-bottom: 10px;">
                    <label>First Name</label>
                    <input type="text" placeholder="First Name" name="first_name" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Last Name</label>
                    <input type="text" placeholder="Last Name" name="last_name" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Phone</label>
                    <input type="text" placeholder="Phone" name="phone" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Email</label>
                    <input type="text" placeholder="Email" name="email" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Country</label>
                    <select name="country" class="form-control">
                        <?php foreach ($countries as $country){ ?>
                            <option value="<?= $country['id']?>"><?= $country['name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="Submit">
                </div>
            </form>
        </div>
    </div>

@endsection

