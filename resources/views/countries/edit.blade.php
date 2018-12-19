<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 12/6/2018
 * Time: 2:22 PM
 */

?>
@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Edit Country Detail</h1>
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div><br>
        @endif
        <div class="col-md-5" style="margin-top: 10px; margin-bottom: 10px;">
            <form method="post" action="{{ route('country-update') }}" enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="row" style="margin-bottom: 10px;">
                    <label>Name</label>
                    <input type="text" value="<?= $data['name']?>" name="name" class="form-control">
                    <input type="hidden" value="<?= $data['id']?>" name="id" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Email</label>
                    <input type="text" value="<?= $data['email']?>" name="email" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Website</label>
                    <input type="text" value="<?= $data['website']?>" name="website" class="form-control">
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <label>Logo(minimum 100×100)</label>
                    <input type="file" name="logo">
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success btn-sm" value="Update">
                </div>
            </form>
        </div>
    </div>

@endsection
