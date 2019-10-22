@extends('layouts.theme')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">User User Profile</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="main-tbl" style="width: 450px;">
                            <form method="post" action="/user/edit" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-striped">
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type="hidden" name="userId" value="{{ $userData['id'] }}" >
                                            <input type="text" class="form-control" name="email" value="{{ $userData['email'] }}" id="email" placeholder="Email" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>
                                            <input type="text" name="name" class="form-control" value="{{ $userData['name'] }}" placeholder="Enter Name" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Father / Husband Name</td>
                                        <td>
                                            <input type="text" name="father_name" value="{{$userData['father_name']}}" class="form-control" id="father_name" placeholder="Father Name" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CNIC</td>
                                        <td>
                                            <input type="text" name="cnic" id="cnic" value="{{$userData['cnic']}}" class="form-control" placeholder="xxxxx-xxxxxxx-x" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth</td>
                                        <td>
                                            <input type="text" class="form-control" name="dob" id="dob" placeholder="dd/mm/yyyy" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <textarea class="form-control" name="address" id="address" cols="90" rows="5" required>{{$userData['address']}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td>
                                            <input type="text" class="form-control" value="{{$userData['contact']}}" name="contact" id="contact" placeholder="Contact Number" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Blood group</td>
                                        <td>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Joining Code</td>
                                        <td>{{$userData['joining_code']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Joining Date</td>
                                        <td>{{$userData['joining_date']}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nominee</td>
                                        <td>
                                            <input type="text" value="{{$userData['nominee']}}" class="form-control" name="nominee" id="nominee" placeholder="Nominee Name" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nominee CNIC</td>
                                        <td>
                                            <input type="text" value="{{$userData['nominee_cnic']}}" class="form-control" name="nomineecnic" id="nominee_cnic" placeholder="xxxxx-xxxxxxx-x" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nominee Contact</td>
                                        <td>
                                            <input type="text" value="{{$userData['nominee_contact']}}" class="form-control" name="nomineecontact" id="nominee_contact" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Filer</td>
                                        <td>
                                            <select class="form-control" name="filer" required>
                                                <option value="">Please Select</option>
                                                <option value="filer">Filer</option>
                                                <option value="non-filer">Non Filer</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rank</td>
                                        <td>
                                            <input type="text" value="{{$userData['rank']}}" class="form-control" name="rank" id="rank" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
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
    <script>
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
            document.getElementById('nominee_cnic').addEventListener('input', function (e) {
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

        });
    </script>
@endsection
