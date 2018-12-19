<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 12/6/2018
 * Time: 1:50 PM
 */
//echo '<pre>';
//print_r($data);
//exit;
?>
@extends('layouts.theme')

@section('content')
    <div class="container-fluid">
        <!-- Page Content -->
        <h1>Country Listing</h1>
        @if (\Session::has('success'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count =0 ;
                foreach ($data as $key => $value){ $count++; ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['website']; ?></td>
                    <td>
                        <a href="{{ url('country-edit/'.$value['id']) }}" target="_blank" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('country-delete/'.$value['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>

                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

@endsection

