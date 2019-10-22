<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 29/09/2018
 * Time: 6:28 PM
 */
?>
@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                @if ( $errors->count() > 0 )
                    <p style="color: red">The following errors have occurred:</p>
                    <br/>
                        @foreach( $errors->all() as $message )
                            <p style="color: red">{{ $message }}</p>
                        @endforeach
                @endif
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Invoice</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="post" action="/invoice" >
                            @csrf
                            <div class="box-body">
                                <div class="form-group" >
                                    <label for="exampleInputEmail1">Member</label>
                                    <select class="form-control" name="user" >
                                        <option value="">Please Select Member</option>
                                        @foreach ($users as $item)
                                            <option value="{{$item->id}}">{{$item->name." - ".$item->joining_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="">Please Select</option>
                                        <option value="DEBIT">DEBIT</option>
                                        <option value="CREDIT">CREDIT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="text" class="form-control" name="date" placeholder="dd/mm/yy">
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

