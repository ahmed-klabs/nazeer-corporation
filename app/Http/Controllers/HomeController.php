<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use App\Http\Controllers\Carbon\Carbon ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = '';
        if(Auth::User()->role == 'admin'){
            $users = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points')->where('role','user')->get();
        }
        else{
            $sponser_code = Auth::User()->joining_code;
            $users = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points')->where('role','user')->where('sponsor_code',$sponser_code)->get();

        }

        return view('dashboard', compact('users'));
    }

    public function add_user(){
        return view('invite-user');
    }

    public function profile(){
        // for child Count
        $sponser_code = Auth::User()->joining_code;

        $childCount = User::where('sponsor_code', $sponser_code)->count();
        $userDetail = User::find(Auth::user()->id);

        return view('profile', compact('userDetail','childCount'));
    }
    public function user_profile($id){

        // for child Count
        $sponser_code = Auth::User()->joining_code;
        $childCount = User::where('sponsor_code', $sponser_code)->count();

        $userDetail = User::find($id);

        return view('profile', compact('userDetail','childCount'));
    }
    // sponsor Code Validation
    public function checkChild(Request $request){

        $sponsorCode = $request->sponsorCode;
        $childCount = User::where('sponsor_code', $sponsorCode)->count();
        return response()->json($childCount);
    }
    public function create_user(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->cnic = $request->cnic;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->sponsor_code = $request->sponsor_code;
        $user->blood_group = $request->blood_group;
        $user->joining_code = $request->joining_code;
        $user->joining_date = "2019-01-03";
        $user->nominee = $request->nominee;
        $user->nominee_cnic = $request->nomineecnic;
        $user->nominee_contact = $request->nominee_contact;
        $user->slip_number = $request->slip_number;
        $user->amount = $request->amount;
        $user->points = $request->points;
        $user->role = "user";
        $user->email = $request->email;
        $user->password = bcrypt($request->pwd);

        $user->save();
        // Can send email to
        return redirect('/home');
    }
}
