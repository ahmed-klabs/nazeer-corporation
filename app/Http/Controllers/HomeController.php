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
//        $sponser_code = Auth::User()->joining_code;

        $userData = User::find($id);
        $userSponserCode = $userData->joining_code;
        $userAmount = $userData->amount;
        $userPoints = $userData->points;
        $dateOfCheck = date("d/m/Y", strtotime($userData->joining_date));

//        $childCount = User::where('sponsor_code', $sponser_code)->count();

        $matchingBonus = 0;
        $totalCustomers = 0;
        $childsAmount = 0;
        $childsPoints = 0;
        $firstChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $userSponserCode)->get();
        if(!empty($firstChilds)){

            $totalCustomers += count($firstChilds);

            if($totalCustomers == 3){
                $matchingBonus = 1;
            }

            foreach ($firstChilds as $firstChild){
                $childsAmount += $firstChild->amount;
                $childsPoints +=  $firstChild->points;

                $secondChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $firstChild->joining_code)->get();
                if(!empty($secondChilds)){

                    $totalCustomers += count($secondChilds);
                    foreach ($secondChilds as $secondChild){
                        $childsAmount += $secondChild->amount;
                        $childsPoints +=  $secondChild->points;

                        $thirdChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $secondChild->joining_code)->get();
                        if(!empty($thirdChilds)){

                            $totalCustomers += count($thirdChilds);
                            foreach ($thirdChilds as $thirdChild){
                                $childsAmount += $thirdChild->amount;
                                $childsPoints +=  $thirdChild->points;

                                $forthChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $thirdChild->joining_code)->get();
                                if(!empty($forthChilds)){

                                    $totalCustomers += count($forthChilds);
                                    foreach ($forthChilds as $forthChild){
                                        $childsAmount += $forthChild->amount;
                                        $childsPoints +=  $forthChild->points;

                                        $fivthChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $forthChild->joining_code)->get();
                                        if(!empty($fivthChilds)){

                                            $totalCustomers += count($fivthChilds);
                                            foreach ($fivthChilds as $fivthChild){
                                                $childsAmount += $fivthChild->amount;
                                                $childsPoints +=  $fivthChild->points;

                                                $sixthChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $fivthChild->joining_code)->get();
                                                if(!empty($sixthChilds)){

                                                    $totalCustomers += count($sixthChilds);
                                                    foreach ($sixthChilds as $sixthChild){
                                                        $childsAmount += $sixthChild->amount;
                                                        $childsPoints +=  $sixthChild->points;

                                                        $seventhChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $sixthChild->joining_code)->get();
                                                        if(!empty($seventhChilds)){

                                                            $totalCustomers += count($seventhChilds);
                                                            foreach ($seventhChilds as $seventhChild){
                                                                $childsAmount += $seventhChild->amount;
                                                                $childsPoints +=  $seventhChild->points;

                                                                $eighthChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $seventhChild->joining_code)->get();
                                                                if(!empty($eighthChilds)){

                                                                    $totalCustomers += count($eighthChilds);
                                                                    foreach ($eighthChilds as $eighthChild){
                                                                        $childsAmount += $eighthChild->amount;
                                                                        $childsPoints +=  $eighthChild->points;
                                                                    }

                                                                }

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

//        return array(
//            'Name'=>$userData->name,
//            'Amount'=>$userAmount,
//            'Points'=>$userPoints,
//            'Total Customers'=>$totalCustomers,
//            'Total Amount'=>$userAmount + $childsAmount,
//            'Total Points'=>$userPoints + $childsPoints,
//            );


        $totalAmount = $childsAmount + $userAmount;
        $totalPoints = $childsPoints + $userPoints;
        $customerPercentage = 0;
        if($totalPoints >= 160){
            $customerPercentage = 15;
        }
        else if($totalPoints >= 520){
            $customerPercentage = 20;
        }
        else if($totalPoints >= 1600){
            $customerPercentage = 25;
        }
        else if($totalPoints >= 4840){
            $customerPercentage = 30;
        }
        else if($totalPoints >= 14560){
            $customerPercentage = 35;
        }
        else if($totalPoints >= 43720){
            $customerPercentage = 40;
        }
        else if($totalPoints >= 131200){
            $customerPercentage = 45;
        }

        $totalPercentage = $customerPercentage + 5;


        return view('profile', compact('userData','totalCustomers','totalAmount','totalPoints','customerPercentage','matchingBonus','dateOfCheck','totalPercentage'));
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
