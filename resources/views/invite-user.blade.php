<?php
/**
 * Created by PhpStorm.
 * User: Muhammad Ahmed
 * Date: 12/19/2018
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
                    <h3 class="box-title">Invite New Member</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="post" action="/add-user" >
                            @csrf
                            <div class="box-body">
                                <div class="form-group <?php if(isset($error)) $error->has('name') ? 'has-error': ''; ?>" >
                                    <label for="exampleInputEmail1">Member Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('father_name') ? 'has-error': ''; ?>">
                                    <label for="father_name">Father/Husband Name</label>
                                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father Name" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('cnic') ? 'has-error': ''; ?>">
                                    <label for="cnic">CNIC Number</label>
                                    <input type="text" name="cnic" class="form-control" id="cnic" placeholder="xxxxx-xxxxxxx-x" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('filer') ? 'has-error': ''; ?>">
                                    <label for="filer">Filer</label>
                                    <select class="form-control" name="filer" id="filer" required>
                                        <option value="">Please Select</option>
                                        <option value="filer">Filer</option>
                                        <option value="non-filer">Non Filer</option>
                                    </select>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('dob') ? 'has-error': ''; ?>">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="text" class="form-control" name="dob" id="dob" placeholder="dd/mm/yyyy" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('address') ? 'has-error': ''; ?>">
                                    <label for="address">Permenent Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="90" rows="5" required></textarea>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('contact') ? 'has-error': ''; ?>">
                                    <label for="contact">Contact Number</label>
                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group<?php if(isset($error)) $error->has('sponsor_code') ? 'has-error': ''; ?>">
                                    <label for="sponsor_code">Sponsor's Code</label>
                                    <input type="text" class="form-control" name="sponsor_code" id="sponsor_code" placeholder="Sponsors Code" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('blood_group') ? 'has-error': ''; ?>">
                                    <label for="blood_group">Blood Group</label>
                                    {{--<input type="text" class="form-control" name="blood_group" id="blood_group" placeholder="Blood Group" required>--}}
                                    <select class="form-control" name="blood_group" id="blood_group" required>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>Unknown</option>
                                    </select>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('joining_code') ? 'has-error': ''; ?>">
                                    <label for="joining_code">Joining Code</label>
                                    {{--<input type="text" class="form-control" name="joining_code" id="joining_code" value="" placeholder="" required>--}}
                                    <input type="text" class="form-control" name="joining_code" id="joining_code" value="" placeholder="will be auto generate on save" disabled>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('joining_date') ? 'has-error': ''; ?>">
                                    <label for="joining_date">Joining Date</label>
                                    <input type="text" class="form-control" name="joining_date" id="joining_date" placeholder="dd/mm/yyyy" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('nominee') ? 'has-error': ''; ?>">
                                    <label for="nominee">Nominee Name</label>
                                    <input type="text" class="form-control" name="nominee" id="nominee" placeholder="Nominee Name" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('nomineecnic') ? 'has-error': ''; ?>">
                                    <label for="nomineecnic">Nominee CNIC</label>
                                    <input type="text" class="form-control" name="nomineecnic" id="nomineecnic" placeholder="xxxxx-xxxxxxx-x" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('nominee_contact') ? 'has-error': ''; ?>">
                                    <label for="nominee_contact">Nominee Contact</label>
                                    <input type="text" class="form-control" name="nominee_contact" id="nominee_contact" placeholder="Nominee Contact" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('slip_number') ? 'has-error': ''; ?>">
                                    <label for="slip_number">Slip Number</label>
                                    <input type="text" class="form-control" name="slip_number" id="slip_number" placeholder="Slip Number" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('amount') ? 'has-error': ''; ?> ">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" min="1000" required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('points') ? 'has-error': ''; ?> ">
                                    <label for="points">Points</label>
                                    <input type="number" class="form-control" name="points" id="points" placeholder="Points" readonly required>
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('email') ? 'has-error': ''; ?>">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                    {{--<input type="text" class="form-control" name="email" id="email" placeholder="Will be autogenerate on save" disabled>--}}
                                </div>
                                <div class="form-group <?php if(isset($error)) $error->has('pwd') ? 'has-error': ''; ?>">
                                    <label for="new-user-pwd">Password</label>
                                    {{--<input type="text" class="form-control" id="new-user-pwd" name="pwd" placeholder="Password" required>--}}
                                    <input type="text" class="form-control" id="new-user-pwd" name="pwd" placeholder="Will be same as NIC" disabled>
                                    {{--<button type="button" class="btn btn-warning" id="generate-pwd" style="margin-top: 5px;">Generate Password</button>--}}
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
<script>
    // Sponsor code Validation
    $(document).on('blur', '#sponsor_code', function () {
        var sponsorCode = $(this).val();

        $.ajax({
            url: '/checkChild',
            type: 'POST',
            data: {"_token": "{{ csrf_token() }}", sponsorCode:sponsorCode},
            dataType: 'JSON',
            success: function (response) {
                // you will get response from your php page (what you echo or print)
                if(response == 3){
                    // Need to create validation UI
                    $('#sponsor_code').style.borderColor = "red";
                    $('#sponsor_code').focus();
                    alert('child limit reached');
                }
            }
        });
    });
    $(document).ready(function () {

        // contact number mask
        document.getElementById('contact').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '' + x[3] : '');
        });
        // nominee contact number mask
        document.getElementById('nominee_contact').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '' + x[3] : '');
        });
        // cnic mask
        document.getElementById('cnic').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,7})(\d{0,1})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        // nominee cnic mask
        document.getElementById('nomineecnic').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,5})(\d{0,7})(\d{0,1})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
        });
        // dob mask
        document.getElementById('dob').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '/' + x[2] + (x[3] ? '/' + x[3] : '');
        });
        // joining date mask
        document.getElementById('joining_date').addEventListener('input', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '' + x[1] + '/' + x[2] + (x[3] ? '/' + x[3] : '');
        });

//        var pwd = Math.random().toString(36).slice(-8);
//        console.log(pwd);
//        $('#joining_code').val(pwd);

        $("#amount").keyup(function(){
            var val = $(this).val();
            val = val/1000;
            $('#points').val(val);
        });
    });
</script>
@endsection

