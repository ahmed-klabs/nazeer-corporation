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
        <h1>Civilians Listing</h1>
        @if (\Session::has('update'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('update') }}</p>
            </div><br />
        @endif
        @if (\Session::has('delete'))
            <div class="alert alert-danger">
                <p>{{ \Session::get('delete') }}</p>
            </div><br />
        @endif
        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px;">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count =0 ;
                foreach ($data as $key => $value){ $count++; ?>
                <tr>
                    <td><?= $count; ?></td>
                    <td><?= $value['first_name']; ?></td>
                    <td><?= $value['last_name']; ?></td>
                    <td><?= $value['phone']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td>
                        <a href="{{ url('civilian-edit/'.$value['id']) }}" target="_blank" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('civilian-delete/'.$value['id']) }}" class="btn btn-danger btn-sm">Delete</a>
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


