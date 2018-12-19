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
        <h1>Edit Civilian Detail</h1>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div><br>
        @endif
        <div class="col-md-5" style="margin-top: 10px; margin-bottom: 10px;">
            <form method="post" action="{{ route('civilian-update') }}" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="row" style="margin-bottom: 10px;">
                    <label>First Name</label>
                    <input type="text" value="<?= $data['first_name']?>" name="first_name" class="form-control">
                    <input type="hidden" value="<?= $data['id']?>" name="id" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Last Name</label>
                    <input type="text" value="<?= $data['last_name']?>" name="last_name" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Phone</label>
                    <input type="text" value="<?= $data['phone']?>" name="phone" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Email</label>
                    <input type="text" value="<?= $data['email']?>" name="email" class="form-control">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="Update">
                </div>
            </form>
        </div>
    </div>

@endsection

