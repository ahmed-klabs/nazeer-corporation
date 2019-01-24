<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ForgotPassword extends Controller
{
    // Reset Password
    public function changePassword(Request $request){
        $user = User::where('cnic', $request->cnic)->get();

        if(count($user) > 0){
            User::where('cnic', $request->cnic)->update(['password' => bcrypt($request->password)]);

            $status = "Password has been updated Successfully!!";
            return view('auth.login', compact('status'));
        }else{
            $error = "CNIC Number is not valid!!";
            return view('auth.passwords.email', compact('error'));
        }
    }
}
