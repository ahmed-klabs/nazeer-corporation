<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use App\Http\Controllers\Carbon\Carbon ;
use DB;

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

    public function index(){

        $userData = Auth::User();
        $userCode = $userData->joining_code;
        $totalPoints = $userData->total_points;

        if($userData->rank >= 8){
            $userRank = 'General Manager';
        }
        else if($userData->rank == 7){
            $userRank = 'Deputy General Manager';
        }
        else if($userData->rank == 6){
            $userRank = 'Asst. General Manager';
        }
        else if($userData->rank == 5){
            $userRank = 'Executive Sales Manager';
        }
        else if($userData->rank == 4){
            $userRank = 'Sales Manager';
        }
        else if($userData->rank == 3){
            $userRank = 'Deputy Sales Manager';
        }
        else if($userData->rank == 2){
            $userRank = 'Asst. Sales Manager';
        }
        else if($userData->rank == 1){
            $userRank = 'Sales Officer';
        }

        $rank = $userRank;

        return view('home', compact('userData','totalPoints','userCode','rank'));

    }

    public function dashboard()
    {

        $data = Auth::User();
        $sponser_code = $data->joining_code;
        $sponser_name = $data->name;
        $users = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$sponser_code)->get();

        if(!empty($users)){
            foreach($users as $user){
                $allUsers[] = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'contact' => $user->contact,
                    'cnic' => $user->cnic,
                    'joining_code' => $user->joining_code,
                    'joining_date' => $user->joining_date,
                    'sponsor_code' => $user->sponsor_code,
                    'sponsor_name' => $sponser_name,
                    'points' => $user->points,
                    'filer' => $user->filer
                );

                $secondChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$user->joining_code)->get();
                foreach($secondChilds as $secondChild){
                    $allUsers[] = array(
                        'id' => $secondChild->id,
                        'name' => $secondChild->name,
                        'email' => $secondChild->email,
                        'contact' => $secondChild->contact,
                        'cnic' => $secondChild->cnic,
                        'joining_code' => $secondChild->joining_code,
                        'joining_date' => $secondChild->joining_date,
                        'sponsor_code' => $secondChild->sponsor_code,
                        'sponsor_name' => $user->name,
                        'points' => $secondChild->points,
                        'filer' => $secondChild->filer
                    );

                    $thirdChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$secondChild->joining_code)->get();
                    foreach($thirdChilds as $thirdChild){
                        $allUsers[] = array(
                            'id' => $thirdChild->id,
                            'name' => $thirdChild->name,
                            'email' => $thirdChild->email,
                            'contact' => $thirdChild->contact,
                            'cnic' => $thirdChild->cnic,
                            'joining_code' => $thirdChild->joining_code,
                            'joining_date' => $thirdChild->joining_date,
                            'sponsor_code' => $thirdChild->sponsor_code,
                            'sponsor_name' => $secondChild->name,
                            'points' => $thirdChild->points,
                            'filer' => $thirdChild->filer
                        );

                        $forthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$thirdChild->joining_code)->get();
                        foreach($forthChilds as $forthChild){
                            $allUsers[] = array(
                                'id' => $forthChild->id,
                                'name' => $forthChild->name,
                                'email' => $forthChild->email,
                                'contact' => $forthChild->contact,
                                'cnic' => $forthChild->cnic,
                                'joining_code' => $forthChild->joining_code,
                                'joining_date' => $forthChild->joining_date,
                                'sponsor_code' => $forthChild->sponsor_code,
                                'sponsor_name' => $thirdChild->name,
                                'points' => $forthChild->points,
                                'filer' => $forthChild->filer
                            );

                            $fivethChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$forthChild->joining_code)->get();
                            foreach($fivethChilds as $fivethChild){
                                $allUsers[] = array(
                                    'id' => $fivethChild->id,
                                    'name' => $fivethChild->name,
                                    'email' => $fivethChild->email,
                                    'contact' => $fivethChild->contact,
                                    'cnic' => $fivethChild->cnic,
                                    'joining_code' => $fivethChild->joining_code,
                                    'joining_date' => $fivethChild->joining_date,
                                    'sponsor_code' => $fivethChild->sponsor_code,
                                    'sponsor_name' => $forthChild->name,
                                    'points' => $fivethChild->points,
                                    'filer' => $fivethChild->filer
                                );

                                $sixthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$fivethChild->joining_code)->get();
                                foreach($sixthChilds as $sixthChild){
                                    $allUsers[] = array(
                                        'id' => $sixthChild->id,
                                        'name' => $sixthChild->name,
                                        'email' => $sixthChild->email,
                                        'contact' => $sixthChild->contact,
                                        'cnic' => $sixthChild->cnic,
                                        'joining_code' => $sixthChild->joining_code,
                                        'joining_date' => $sixthChild->joining_date,
                                        'sponsor_code' => $sixthChild->sponsor_code,
                                        'sponsor_name' => $fivethChild->name,
                                        'points' => $sixthChild->points,
                                        'filer' => $sixthChild->filer
                                    );

                                    $seventhChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$sixthChild->joining_code)->get();
                                    foreach($seventhChilds as $seventhChild){
                                        $allUsers[] = array(
                                            'id' => $seventhChild->id,
                                            'name' => $seventhChild->name,
                                            'email' => $seventhChild->email,
                                            'contact' => $seventhChild->contact,
                                            'cnic' => $seventhChild->cnic,
                                            'joining_code' => $seventhChild->joining_code,
                                            'joining_date' => $seventhChild->joining_date,
                                            'sponsor_code' => $seventhChild->sponsor_code,
                                            'sponsor_name' => $sixthChild->name,
                                            'points' => $seventhChild->points,
                                            'filer' => $seventhChild->filer
                                        );

                                        $eightthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$seventhChild->joining_code)->get();
                                        foreach($eightthChilds as $eightthChild){
                                            $allUsers[] = array(
                                                'id' => $eightthChild->id,
                                                'name' => $eightthChild->name,
                                                'email' => $eightthChild->email,
                                                'contact' => $eightthChild->contact,
                                                'cnic' => $eightthChild->cnic,
                                                'joining_code' => $eightthChild->joining_code,
                                                'joining_date' => $eightthChild->joining_date,
                                                'sponsor_code' => $eightthChild->sponsor_code,
                                                'sponsor_name' => $seventhChild->name,
                                                'points' => $eightthChild->points,
                                                'filer' => $eightthChild->filer
                                            );


                                        }


                                    }


                                }


                            }


                        }


                    }

                }


            }
        }
        else{
            $allUsers = [];
        }



        return view('dashboard', compact('allUsers'));
    }

    public function user_dashboard($id)
    {

        $data = User::select('joining_code','name')->where('id',$id)->first();
        $sponser_code = $data->joining_code;
        $sponser_name = $data->name;
        $users = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$sponser_code)->get();

        if(!empty($users)){
            foreach($users as $user){
                $allUsers[] = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'contact' => $user->contact,
                    'cnic' => $user->cnic,
                    'joining_code' => $user->joining_code,
                    'joining_date' => $user->joining_date,
                    'sponsor_code' => $user->sponsor_code,
                    'sponsor_name' => $sponser_name,
                    'points' => $user->points,
                    'filer' => $user->filer
                );

                $secondChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$user->joining_code)->get();
                foreach($secondChilds as $secondChild){
                    $allUsers[] = array(
                        'id' => $secondChild->id,
                        'name' => $secondChild->name,
                        'email' => $secondChild->email,
                        'contact' => $secondChild->contact,
                        'cnic' => $secondChild->cnic,
                        'joining_code' => $secondChild->joining_code,
                        'joining_date' => $secondChild->joining_date,
                        'sponsor_code' => $secondChild->sponsor_code,
                        'sponsor_name' => $user->name,
                        'points' => $secondChild->points,
                        'filer' => $secondChild->filer
                    );

                    $thirdChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$secondChild->joining_code)->get();
                    foreach($thirdChilds as $thirdChild){
                        $allUsers[] = array(
                            'id' => $thirdChild->id,
                            'name' => $thirdChild->name,
                            'email' => $thirdChild->email,
                            'contact' => $thirdChild->contact,
                            'cnic' => $thirdChild->cnic,
                            'joining_code' => $thirdChild->joining_code,
                            'joining_date' => $thirdChild->joining_date,
                            'sponsor_code' => $thirdChild->sponsor_code,
                            'sponsor_name' => $secondChild->name,
                            'points' => $thirdChild->points,
                            'filer' => $thirdChild->filer
                        );

                        $forthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$thirdChild->joining_code)->get();
                        foreach($forthChilds as $forthChild){
                            $allUsers[] = array(
                                'id' => $forthChild->id,
                                'name' => $forthChild->name,
                                'email' => $forthChild->email,
                                'contact' => $forthChild->contact,
                                'cnic' => $forthChild->cnic,
                                'joining_code' => $forthChild->joining_code,
                                'joining_date' => $forthChild->joining_date,
                                'sponsor_code' => $forthChild->sponsor_code,
                                'sponsor_name' => $thirdChild->name,
                                'points' => $forthChild->points,
                                'filer' => $forthChild->filer
                            );

                            $fivethChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$forthChild->joining_code)->get();
                            foreach($fivethChilds as $fivethChild){
                                $allUsers[] = array(
                                    'id' => $fivethChild->id,
                                    'name' => $fivethChild->name,
                                    'email' => $fivethChild->email,
                                    'contact' => $fivethChild->contact,
                                    'cnic' => $fivethChild->cnic,
                                    'joining_code' => $fivethChild->joining_code,
                                    'joining_date' => $fivethChild->joining_date,
                                    'sponsor_code' => $fivethChild->sponsor_code,
                                    'sponsor_name' => $forthChild->name,
                                    'points' => $fivethChild->points,
                                    'filer' => $fivethChild->filer
                                );

                                $sixthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$fivethChild->joining_code)->get();
                                foreach($sixthChilds as $sixthChild){
                                    $allUsers[] = array(
                                        'id' => $sixthChild->id,
                                        'name' => $sixthChild->name,
                                        'email' => $sixthChild->email,
                                        'contact' => $sixthChild->contact,
                                        'cnic' => $sixthChild->cnic,
                                        'joining_code' => $sixthChild->joining_code,
                                        'joining_date' => $sixthChild->joining_date,
                                        'sponsor_code' => $sixthChild->sponsor_code,
                                        'sponsor_name' => $fivethChild->name,
                                        'points' => $sixthChild->points,
                                        'filer' => $sixthChild->filer
                                    );

                                    $seventhChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$sixthChild->joining_code)->get();
                                    foreach($seventhChilds as $seventhChild){
                                        $allUsers[] = array(
                                            'id' => $seventhChild->id,
                                            'name' => $seventhChild->name,
                                            'email' => $seventhChild->email,
                                            'contact' => $seventhChild->contact,
                                            'cnic' => $seventhChild->cnic,
                                            'joining_code' => $seventhChild->joining_code,
                                            'joining_date' => $seventhChild->joining_date,
                                            'sponsor_code' => $seventhChild->sponsor_code,
                                            'sponsor_name' => $sixthChild->name,
                                            'points' => $seventhChild->points,
                                            'filer' => $seventhChild->filer
                                        );

                                        $eightthChilds = User::select('id','name','email','contact','joining_code','joining_date','sponsor_code','points','filer','cnic')->where('role','user')->where('sponsor_code',$seventhChild->joining_code)->get();
                                        foreach($eightthChilds as $eightthChild){
                                            $allUsers[] = array(
                                                'id' => $eightthChild->id,
                                                'name' => $eightthChild->name,
                                                'email' => $eightthChild->email,
                                                'contact' => $eightthChild->contact,
                                                'cnic' => $eightthChild->cnic,
                                                'joining_code' => $eightthChild->joining_code,
                                                'joining_date' => $eightthChild->joining_date,
                                                'sponsor_code' => $eightthChild->sponsor_code,
                                                'sponsor_name' => $seventhChild->name,
                                                'points' => $eightthChild->points,
                                                'filer' => $eightthChild->filer
                                            );


                                        }


                                    }


                                }


                            }


                        }


                    }

                }


            }
        }
        else{
            $allUsers = [];
        }



        return view('dashboard', compact('allUsers'));
    }

    public function add_user(){
        return view('invite-user');
    }

    public function profile()
    {

        $userData = Auth::User();
        $dateOfCheck = date("d/m/Y", strtotime($userData->joining_date));

        $first_day_of_previous_month  = date("Y-m-d", strtotime("first day of previous month"));
        $last_day_of_previous_month =  date("Y-m-d", strtotime("last day of previous month"));

        $lastMonthCheck = DB::table('user_logs')
            ->where('sponser_id',$userData->id)
            ->whereBetween('datetime', array($first_day_of_previous_month." 00:00:00", $last_day_of_previous_month." 23:59:59"))
            ->orderBy('id', 'desc')
            ->first();

		if(!empty($lastMonthCheck)){
			$lastMonthCheck_total_amount = $lastMonthCheck->total_amount;
		}
		else
		{
			$lastMonthCheck_total_amount = 0;
		}

        $sum_amount = $userData->direct_amount + $userData->direct_line_amount + $userData->in_direct_line_amount + $userData->matching_bonus_amount;

        $indPoints = $userData->total_points - $userData->points;
        $indPoints = $indPoints - $userData->direct_line_points;


        if($sum_amount >= $userData->total_amount){
            $total_amount = $sum_amount;
        }
        else{
            $total_amount = $userData->total_amount;
        }

        if($userData->filer == 'filer'){
            $filerDeduction = ($total_amount / 100) * 12;
            $filerDeductionLastMonth = ($lastMonthCheck_total_amount / 100) * 12;
        }
        else{
            $filerDeduction = ($total_amount / 100) * 15;
            $filerDeductionLastMonth = ($lastMonthCheck_total_amount / 100) * 15;
        }

        $computerFee = 150;

        $amountToBePaidAfterDeduction = ($total_amount - $filerDeduction) - $computerFee;
        $lastMonthCheckAmount = ($lastMonthCheck_total_amount - $filerDeductionLastMonth) - $computerFee;
		if($lastMonthCheckAmount <= 0 ){
			$lastMonthCheckAmount = 0;
		}

        if($userData->rank >= 8){
            $userRank = 'General Manager';
        }
        else if($userData->rank == 7){
            $userRank = 'Deputy General Manager';
        }
        else if($userData->rank == 6){
            $userRank = 'Asst. General Manager';
        }
        else if($userData->rank == 5){
            $userRank = 'Executive Sales Manager';
        }
        else if($userData->rank == 4){
            $userRank = 'Sales Manager';
        }
        else if($userData->rank == 3){
            $userRank = 'Deputy Sales Manager';
        }
        else if($userData->rank == 2){
            $userRank = 'Asst. Sales Manager';
        }
        else if($userData->rank == 1){
            $userRank = 'Sales Officer';
        }

        $per = $userData->link_bonus_percentage;

        return view('profile', compact('userData','total_amount','dateOfCheck','filerDeduction','computerFee','amountToBePaidAfterDeduction','userRank','per','indPoints','lastMonthCheckAmount'));

    }

    public function user_profile($id){
        $userData = User::find($id);

        $dateOfCheck = date("d/m/Y", strtotime($userData->joining_date));

        $first_day_of_previous_month  = date("Y-m-d", strtotime("first day of previous month"));
        $last_day_of_previous_month =  date("Y-m-d", strtotime("last day of previous month"));

        $lastMonthCheck = DB::table('user_logs')
            ->where('sponser_id',$userData->id)
            ->whereBetween('datetime', array($first_day_of_previous_month." 00:00:00", $last_day_of_previous_month." 23:59:59"))
            ->orderBy('id', 'desc')
            ->first();

		if(!empty($lastMonthCheck)){
			$lastMonthCheck_total_amount = $lastMonthCheck->total_amount;
		}
		else
		{
			$lastMonthCheck_total_amount = 0;
		}

		$sum_amount = $userData->direct_amount + $userData->direct_line_amount + $userData->in_direct_line_amount + $userData->matching_bonus_amount;

        $indPoints = $userData->total_points - $userData->points;
        $indPoints = $indPoints - $userData->direct_line_points;


        if($sum_amount >= $userData->total_amount){
            $total_amount = $sum_amount;
        }
        else{
            $total_amount = $userData->total_amount;
        }

        if($userData->filer == 'filer'){
            $filerDeduction = ($total_amount / 100) * 12;
            $filerDeductionLastMonth = ($lastMonthCheck_total_amount / 100) * 12;
        }
        else{
            $filerDeduction = ($total_amount / 100) * 15;
            $filerDeductionLastMonth = ($lastMonthCheck_total_amount / 100) * 15;
        }

        $computerFee = 150;

        $amountToBePaidAfterDeduction = ($total_amount - $filerDeduction) - $computerFee;
        $lastMonthCheckAmount = ($lastMonthCheck_total_amount - $filerDeductionLastMonth) - $computerFee;
		if($lastMonthCheckAmount <= 0 ){
			$lastMonthCheckAmount = 0;
		}


        if($userData->rank >= 8){
            $userRank = 'General Manager';
        }
        else if($userData->rank == 7){
            $userRank = 'Deputy General Manager';
        }
        else if($userData->rank == 6){
            $userRank = 'Asst. General Manager';
        }
        else if($userData->rank == 5){
            $userRank = 'Executive Sales Manager';
        }
        else if($userData->rank == 4){
            $userRank = 'Sales Manager';
        }
        else if($userData->rank == 3){
            $userRank = 'Deputy Sales Manager';
        }
        else if($userData->rank == 2){
            $userRank = 'Asst. Sales Manager';
        }
        else if($userData->rank == 1){
            $userRank = 'Sales Officer';
        }

        $per = $userData->link_bonus_percentage;

        return view('profile', compact('userData','total_amount','dateOfCheck','filerDeduction','computerFee','amountToBePaidAfterDeduction','userRank','per','indPoints','lastMonthCheckAmount'));

    }

    // sponsor Code Validation
    public function checkChild(Request $request){

        $sponsorCode = $request->sponsorCode;
        $childCount = User::where('sponsor_code', $sponsorCode)->count();
        return response()->json($childCount);
    }
    public function create_user(Request $request){


        $userData = User::select('created_at')->where('sponsor_code', $request->sponsor_code)->get();
        $userCount = 0;
        foreach ($userData as $dt){
            if(date('m-Y') == date('m-Y',strtotime($dt->created_at))){
                $userCount++;
            }

        }

        if($userCount >= 3){
            $message = "Monthly Limit reached!!";
            return redirect('/add-user')->withErrors($message);
        }
        else{
            $userLastId = User::select('id')->orderBy('id', 'desc')->first();

            $user = new User();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->cnic = $request->cnic;
            $user->dob = $request->dob;
            $user->address = $request->address;
            $user->contact = $request->contact;
            $user->filer = $request->filer;
            $user->sponsor_code = $request->sponsor_code;
            $user->blood_group = $request->blood_group;
            $user->joining_code = "0000" . strval($userLastId->id + 1);
            $user->joining_date = date("Y-m-d");
            $user->nominee = $request->nominee;
            $user->nominee_cnic = $request->nomineecnic;
            $user->nominee_contact = $request->nominee_contact;
            $user->slip_number = $request->slip_number;
            $user->amount = $request->amount;
            $user->points = $request->points;
            $user->role = "user";
            $user->email = $request->email;
            $user->password = bcrypt(preg_replace('/[^A-Za-z0-9\-]/', '', $request->cnic));
            $user->total_points = $request->points;

            $direct_bonus_percentage_customer = 5;
            if($request->points < 40){
                $direct_bonus_percentage_customer = 0;
            }
            $direct_amount_customer = ($request->amount / 100) * $direct_bonus_percentage_customer;

            $user->direct_bonus_percentage = $direct_bonus_percentage_customer;
            $user->direct_amount = $direct_amount_customer;
            $user->direct_line_amount = 0;
            $user->in_direct_line_amount = 0;
            $user->matching_bonus_amount = 0;
            $user->total_amount = $direct_amount_customer;
            $user->rank = 1;
            $user->save();

            //update sponsor data
            $sponsor_data = User::where('joining_code',$request->sponsor_code)->first();
            if(!empty($sponsor_data)){
                $sponsor1_data = User::where('joining_code',$sponsor_data->sponsor_code)->first();
                if(!empty($sponsor1_data)){
                    $sponsor2_data = User::where('joining_code',$sponsor1_data->sponsor_code)->first();
                    if(!empty($sponsor2_data)){
                        $sponsor3_data = User::where('joining_code',$sponsor2_data->sponsor_code)->first();
                        if(!empty($sponsor3_data)){
                            $sponsor4_data = User::where('joining_code',$sponsor3_data->sponsor_code)->first();
                            if(!empty($sponsor4_data)){
                                $sponsor5_data = User::where('joining_code',$sponsor4_data->sponsor_code)->first();
                                if(!empty($sponsor5_data)){
                                    $sponsor6_data = User::where('joining_code',$sponsor5_data->sponsor_code)->first();
                                    if(!empty($sponsor6_data)){
                                        $sponsor7_data = User::where('joining_code',$sponsor6_data->sponsor_code)->first();
                                    }
                                }
                            }
                        }
                    }
                }
            }



            $sponsor_points = $sponsor_data->points;
            $total_customers = $sponsor_data->total_customers + 1;
            $direct_line_points = $sponsor_data->direct_line_points + $request->points;
            $in_direct_line_points = $sponsor_data->in_direct_line_points;
            $total_points = $sponsor_points + $direct_line_points;
            $direct_bonus_percentage = 5;
            $link_bonus_percentage = $sponsor_data->link_bonus_percentage;
            $rank = $sponsor_data->rank;

            if($rank == null){
                $rank = 1;
            }

            $userDataForMatchingBonus = User::select('created_at')->where('sponsor_code', $request->sponsor_code)->get();
            $userCount = 0;
            foreach ($userDataForMatchingBonus as $dt){
                if(date('m-Y') == date('m-Y',strtotime($dt->created_at))){
                    $userCount++;
                }

            }



            $rPoints = 0;
            $rCustomers = 0;
            if($sponsor_data->direct_line_points >= 120 && $sponsor_data->direct_customer >= 3){
                $rPoints = $sponsor_data->direct_line_points;
                $rCustomers = $sponsor_data->direct_customer;
            }
            else{
                $rPoints = $sponsor_data->direct_line_points + $request->points;
                $rCustomers = $sponsor_data->direct_customer + 1;
            }

            // Get 2nd Line Direct Points
            $sponser2ndLineChilds = User::where('sponsor_code',$sponsor_data->joining_code)->get();

            if(!empty($sponser2ndLineChilds)){
                foreach ($sponser2ndLineChilds as $sponser2ndLineChild){
                    $rPoints += $sponser2ndLineChild->direct_line_points;
                    if($sponser2ndLineChild->direct_customer >= 3){
                        $rCustomers += $sponser2ndLineChild->direct_customer;
                    }

                    // Get 3rd Line Direct Points
                    $sponser3rdLineChilds = User::where('sponsor_code',$sponser2ndLineChild->joining_code)->get();
                    if(!empty($sponser3rdLineChilds)){
                        foreach ($sponser3rdLineChilds as $sponser3rdLineChild){
                            $rPoints += $sponser3rdLineChild->direct_line_points;
                            if($sponser3rdLineChild->direct_customer >= 3){
                                $rCustomers += $sponser3rdLineChild->direct_customer;
                            }
                            // Get 4th Line Direct Points
                            $sponser4thLineChilds = User::where('sponsor_code',$sponser3rdLineChild->joining_code)->get();
                            if(!empty($sponser4thLineChilds)){
                                foreach ($sponser4thLineChilds as $sponser4thLineChild){
                                    $rPoints += $sponser4thLineChild->direct_line_points;
                                    if($sponser4thLineChild->direct_customer >= 3){
                                        $rCustomers += $sponser4thLineChild->direct_customer;
                                    }

                                    // Get 5th Line Direct Points
                                    $sponser5thLineChilds = User::where('sponsor_code',$sponser4thLineChild->joining_code)->get();
                                    if(!empty($sponser5thLineChilds)){
                                        foreach ($sponser5thLineChilds as $sponser5thLineChild){
                                            $rPoints += $sponser5thLineChild->direct_line_points;
                                            if($sponser5thLineChild->direct_customer >= 3){
                                                $rCustomers += $sponser5thLineChild->direct_customer;
                                            }

                                            // Get 6th Line Direct Points
                                            $sponser6thLineChilds = User::where('sponsor_code',$sponser5thLineChild->joining_code)->get();
                                            if(!empty($sponser6thLineChilds)){
                                                foreach ($sponser6thLineChilds as $sponser6thLineChild){
                                                    $rPoints += $sponser6thLineChild->direct_line_points;
                                                    if($sponser6thLineChild->direct_customer >= 3){
                                                        $rCustomers += $sponser6thLineChild->direct_customer;
                                                    }

                                                    // Get 7th Line Direct Points
                                                    $sponser7thLineChilds = User::where('sponsor_code',$sponser6thLineChild->joining_code)->get();
                                                    if(!empty($sponser7thLineChilds)){
                                                        foreach ($sponser7thLineChilds as $sponser7thLineChild){
                                                            $rPoints += $sponser7thLineChild->direct_line_points;
                                                            if($sponser7thLineChild->direct_customer >= 3){
                                                                $rCustomers += $sponser7thLineChild->direct_customer;
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


            if($rPoints >= 131200 && $rCustomers >= 3279 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 25;
                $rank = 8;
            }
            else if($rPoints >= 43720 && $rCustomers >= 1092 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 22.5;
                $rank = 7;
            }
            else if($rPoints >= 14560 && $rCustomers >= 363 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 20;
                $rank = 6;
            }
            else if($rPoints >= 4840 && $rCustomers >= 120 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 17.5;
                $rank = 5;
            }
            else if($rPoints >= 1600 && $rCustomers >= 39 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 15;
                $rank = 4;
            }
            else if($rPoints >= 520 && $rCustomers >= 12 && $sponsor_data->points >= 40){
                $link_bonus_percentage = 12.5;
                $rank = 3;
            }
            else if($rPoints >= 120 && $rCustomers >= 3){
                $sponser_future_direct_line_points = $sponsor_data->direct_line_points + $request->points;
                if($sponser_future_direct_line_points > 120 && $sponsor_data->points >= 40){
//                if($rPoints > 120){
                    $link_bonus_percentage = 10;
                    $rank = 2;
                }
//                else if($rPoints >= 120){
                else if($sponser_future_direct_line_points >= 120 && $sponsor_data->points >= 40){
                    $link_bonus_percentage = 7.5;
                    $rank = 2;
                }
                else{
                    $link_bonus_percentage = 7.5;
                    $rank = 1;
                }
            }
            else if($total_points >= 40 && $userCount > 0){
                $link_bonus_percentage = 7.5;
            }

            $direct_amount = $sponsor_data->direct_amount;
            $direct_line_amount = (($direct_line_points * 1000) / 100 ) * $link_bonus_percentage;
            $in_direct_line_amount = (($in_direct_line_points * 1000) / 100 ) * 5;

            $matching_bonus_amount = 0;
            $matching_bonus_percentage = 0;
            if($userCount >= 3){
                $matching_bonus_percentage = 1;
                $matching_bonus_amount = (($direct_line_points * 1000) / 100) * $matching_bonus_percentage ;
            }


            $total_amount = $direct_amount + $direct_line_amount + $in_direct_line_amount + $matching_bonus_amount;

            // update sponsor
            User::where('id',$sponsor_data->id)->update([
                'direct_line_points' => $direct_line_points,
                'in_direct_line_points' => $in_direct_line_points,
                'total_points' => $total_points,
                'total_customers' => $total_customers,
                'direct_bonus_percentage' => $direct_bonus_percentage,
                'link_bonus_percentage' => $link_bonus_percentage,
                'matching_bonus_percentage' => $matching_bonus_percentage,
                'direct_amount' => $direct_amount,
                'direct_line_amount' => $direct_line_amount,
                'in_direct_line_amount' => $in_direct_line_amount,
                'matching_bonus_amount' => $matching_bonus_amount,
                'total_amount' => $total_amount,
                'rank' => $rank,
                'direct_customer' => $sponsor_data->direct_customer + 1
            ]);


            // Inserting Users Logs
            DB::table('user_logs')->insert([
                    'new_customer_id' => 0,
                    'new_customer_name' => $request->name,
                    'sponser_id' => $sponsor_data->id,
                    'sponser_name' => $sponsor_data->name,
                    'amount' => $sponsor_data->amount,
                    'points' => $sponsor_data->points,
                    'direct_line_points' => $direct_line_points,
                    'in_direct_line_points' => $in_direct_line_points,
                    'total_points' => $total_points,
                    'total_customers' => $total_customers,
                    'direct_bonus_percentage' => $direct_bonus_percentage,
                    'link_bonus_percentage' => $link_bonus_percentage,
                    'matching_bonus_percentage' => $matching_bonus_percentage,
                    'direct_amount' => $direct_amount,
                    'direct_line_amount' => $direct_line_amount,
                    'in_direct_line_amount' => $in_direct_line_amount,
                    'matching_bonus_amount' => $matching_bonus_amount,
                    'total_amount' => $total_amount,
                    'rank' => $rank,
                    'direct_customer' => $sponsor_data->direct_customer + 1
                ]);


            $sponsor_rank = $rank;
            $sponsor1_rank = '';
            $sponsor2_rank = '';
            $sponsor3_rank = '';
            $sponsor4_rank = '';
            $sponsor5_rank = '';
            $sponsor6_rank = '';
            $sponsor7_rank = '';
            if(!empty($sponsor1_data)){
                $sponsor1_rank = $sponsor1_data->rank;
            }
            if(!empty($sponsor2_data)){
                $sponsor2_rank = $sponsor2_data->rank;
            }
            if(!empty($sponsor3_data)){
                $sponsor3_rank = $sponsor3_data->rank;
            }
            if(!empty($sponsor4_data)){
                $sponsor4_rank = $sponsor4_data->rank;
            }
            if(!empty($sponsor5_data)){
                $sponsor4_rank = $sponsor5_data->rank;
            }
            if(!empty($sponsor6_data)){
                $sponsor4_rank = $sponsor6_data->rank;
            }
            if(!empty($sponsor7_data)){
                $sponsor4_rank = $sponsor7_data->rank;
            }



            if(!empty($sponsor1_data)){
                $this->update_sponsor_direct_points($sponsor1_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor2_data)){
                $this->update_sponsor_direct_points($sponsor2_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor3_data)){
                $this->update_sponsor_direct_points($sponsor3_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor4_data)){
                $this->update_sponsor_direct_points($sponsor4_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor5_data)){
                $this->update_sponsor_direct_points($sponsor5_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor6_data)){
                $this->update_sponsor_direct_points($sponsor6_data->id,$request->points,$userCount,$request->name);
            }
            if(!empty($sponsor7_data)){
                $this->update_sponsor_direct_points($sponsor7_data->id,$request->points,$userCount,$request->name);
            }

            echo "<br/>";
            if($rank == $sponsor6_rank && $rank == $sponsor5_rank && $rank == $sponsor4_rank && $rank == $sponsor3_rank && $rank == $sponsor2_rank && $rank == $sponsor1_rank){
//                echo "sponsor6_rank: <br/>";
                if(!empty($sponsor7_data)){
                    if($sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }


            }
            else if($rank == $sponsor5_rank && $rank == $sponsor4_rank && $rank == $sponsor3_rank && $rank == $sponsor2_rank && $rank == $sponsor1_rank){
//                echo "sponsor5_rank: <br/>";
                if(!empty($sponsor6_data)){
                    if($sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }


            }
            else if($rank == $sponsor4_rank && $rank == $sponsor3_rank && $rank == $sponsor2_rank && $rank == $sponsor1_rank){
//                echo "sponsor4_rank: <br/>";
                if(!empty($sponsor5_data)){
                    if($sponsor5_data->rank > $sponsor4_rank && $sponsor5_data->rank > $sponsor3_rank && $sponsor5_data->rank > $sponsor2_rank && $sponsor5_data->rank > $sponsor1_rank  && $sponsor5_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor5_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor6_data) && $sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }


            }
            else if($rank == $sponsor3_rank && $rank == $sponsor2_rank && $rank == $sponsor1_rank){
//                echo "sponsor3_rank: <br/>";
                if(!empty($sponsor4_data)){

                    if($sponsor4_data->rank > $sponsor3_rank && $sponsor4_data->rank > $sponsor2_rank && $sponsor4_data->rank > $sponsor1_rank  && $sponsor4_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor4_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor5_data) && $sponsor5_data->rank > $sponsor4_rank && $sponsor5_data->rank > $sponsor3_rank && $sponsor5_data->rank > $sponsor2_rank && $sponsor5_data->rank > $sponsor1_rank  && $sponsor5_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor5_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor6_data) && $sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }


            }
            else if($rank == $sponsor2_rank && $rank == $sponsor1_rank){
//                echo "sponsor2_rank: <br/>";
                if(!empty($sponsor3_data)){

                    if($sponsor3_data->rank > $sponsor2_rank && $sponsor3_data->rank > $sponsor1_rank && $sponsor3_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor3_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor4_data) && $sponsor4_data->rank > $sponsor3_rank && $sponsor4_data->rank > $sponsor2_rank && $sponsor4_data->rank > $sponsor1_rank && $sponsor4_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor4_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor5_data) && $sponsor5_data->rank > $sponsor4_rank && $sponsor5_data->rank > $sponsor3_rank && $sponsor5_data->rank > $sponsor2_rank && $sponsor5_data->rank > $sponsor1_rank  && $sponsor5_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor5_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor6_data) && $sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }


            }
            else if($rank == $sponsor1_rank){
//                echo "sponsor1_rank: <br/>";
                if(!empty($sponsor2_data)){

                    if($sponsor2_data->rank > $sponsor1_rank && $sponsor2_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor2_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor3_data) && $sponsor3_data->rank > $sponsor2_rank && $sponsor3_data->rank > $sponsor1_rank && $sponsor3_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor3_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor4_data) && $sponsor4_data->rank > $sponsor3_rank && $sponsor4_data->rank > $sponsor2_rank && $sponsor4_data->rank > $sponsor1_rank && $sponsor4_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor4_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor5_data) && $sponsor5_data->rank > $sponsor4_rank && $sponsor5_data->rank > $sponsor3_rank && $sponsor5_data->rank > $sponsor2_rank && $sponsor5_data->rank > $sponsor1_rank  && $sponsor5_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor5_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor6_data) && $sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }


                }


            }
            else{
//                echo "sponsor_rank: <br/>";
                if(!empty($sponsor1_data)){

                    if($sponsor1_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor1_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor2_data) && $sponsor2_data->rank > $sponsor1_rank && $sponsor2_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor2_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor3_data) && $sponsor3_data->rank > $sponsor2_rank && $sponsor3_data->rank > $sponsor1_rank && $sponsor3_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor3_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor4_data) && $sponsor4_data->rank > $sponsor3_rank && $sponsor4_data->rank > $sponsor2_rank && $sponsor4_data->rank > $sponsor1_data->rank && $sponsor4_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor4_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor5_data) && $sponsor5_data->rank > $sponsor4_rank && $sponsor5_data->rank > $sponsor3_rank && $sponsor5_data->rank > $sponsor2_rank && $sponsor5_data->rank > $sponsor1_rank  && $sponsor5_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor5_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor6_data) && $sponsor6_data->rank > $sponsor5_rank && $sponsor6_data->rank > $sponsor4_rank && $sponsor6_data->rank > $sponsor3_rank && $sponsor6_data->rank > $sponsor2_rank && $sponsor6_data->rank > $sponsor1_rank  && $sponsor6_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor6_data->id,$request->points,$request->name);
                    }

                    if(!empty($sponsor7_data) && $sponsor7_data->rank > $sponsor6_rank && $sponsor7_data->rank > $sponsor5_rank && $sponsor7_data->rank > $sponsor4_rank && $sponsor7_data->rank > $sponsor3_rank && $sponsor7_data->rank > $sponsor2_rank && $sponsor7_data->rank > $sponsor1_rank  && $sponsor7_data->rank > $rank){
                        $this->update_sponsor_indirect_points($sponsor7_data->id,$request->points,$request->name);
                    }

                }
            }


            return redirect('/home');
        }


    }

    public function update_sponsor_direct_points($sponsor_id,$customer_points,$total_customers,$new_customer_name){

        $sponsor1_data = User::where('id',$sponsor_id)->first();

        $total_points_sponsor1 = $sponsor1_data->total_points + $customer_points;
        $total_customers_sponsor1 = $sponsor1_data->total_customers + 1;
        $total_amount_sponsor1 = $sponsor1_data->direct_amount + $sponsor1_data->direct_line_amount;

        $child1 = 0;
        $child2 = 0;
        $child3 = 0;
        $child4 = 0;
        $child5 = 0;
        $child6 = 0;
        $child7 = 0;
        $child8 = 0;


        $allChild1_data = User::where('sponsor_code',$sponsor1_data->joining_code)->get();
        if(!empty($allChild1_data)){
            foreach ($allChild1_data as $child1_data){
                if($child1_data->direct_customer >= 3 && $child1_data->direct_line_points >= 120 && $child1_data->points >= 40){
                    $child1 ++;
                }

                //////////////////
                $allChild2_data = User::where('sponsor_code',$child1_data->joining_code)->get();
                if(!empty($allChild2_data)){
                    foreach ($allChild2_data as $child2_data){
                        if($child2_data->direct_customer >= 3 && $child2_data->direct_line_points >= 120 && $child2_data->points >= 40){
                            $child2 ++;
                        }

                        //////////////////
                        $allChild3_data = User::where('sponsor_code',$child2_data->joining_code)->get();
                        if(!empty($allChild3_data)){
                            foreach ($allChild3_data as $child3_data){
                                if($child3_data->direct_customer >= 3 && $child3_data->direct_line_points >= 120 && $child3_data->points >= 40){
                                    $child3 ++;
                                }

                                //////////////////
                                $allChild4_data = User::where('sponsor_code',$child3_data->joining_code)->get();
                                if(!empty($allChild4_data)){
                                    foreach ($allChild4_data as $child4_data){
                                        if($child4_data->direct_customer >= 3 && $child4_data->direct_line_points >= 120 && $child4_data->points >= 40){
                                            $child4 ++;
                                        }

                                        //////////////////
                                        $allChild5_data = User::where('sponsor_code',$child4_data->joining_code)->get();
                                        if(!empty($allChild5_data)){
                                            foreach ($allChild5_data as $child5_data){
                                                if($child5_data->direct_customer >= 3 && $child5_data->direct_line_points >= 120 && $child5_data->points >= 40){
                                                    $child5 ++;
                                                }

                                                //////////////////
                                                $allChild6_data = User::where('sponsor_code',$child5_data->joining_code)->get();
                                                if(!empty($allChild6_data)){
                                                    foreach ($allChild6_data as $child6_data){
                                                        if($child6_data->direct_customer >= 3 && $child6_data->direct_line_points >= 120 && $child6_data->points >= 40){
                                                            $child6 ++;
                                                        }

                                                        //////////////////
                                                        $allChild7_data = User::where('sponsor_code',$child6_data->joining_code)->get();
                                                        if(!empty($allChild7_data)){
                                                            foreach ($allChild7_data as $child7_data){
                                                                if($child7_data->direct_customer >= 3 && $child7_data->direct_line_points >= 120 && $child7_data->points >= 40){
                                                                    $child7 ++;
                                                                }

                                                                //////////////////
                                                                $allChild8_data = User::where('sponsor_code',$child7_data->joining_code)->get();
                                                                if(!empty($allChild8_data)){
                                                                    foreach ($allChild8_data as $child8_data){
                                                                        if($child8_data->direct_customer >= 3 && $child8_data->direct_line_points >= 120 && $child8_data->points >= 40){
                                                                            $child8 ++;
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

        }

        $link_bonus_percentage_sponsor1 = 7.5;
        $rank_sponsor1 = 1;
        if($child7 >= 2187){
            $cond_match = 'chield7';
            $link_bonus_percentage_sponsor1 = 25;
            $rank_sponsor1 = 8;
        }
        elseif($child6 >= 729){ //3279
            $cond_match = 'chield6';
            $link_bonus_percentage_sponsor1 = 25;
            $rank_sponsor1 = 8;
        }
        else if($child5 >= 243){ //1092
            $cond_match = 'chield5';
            $link_bonus_percentage_sponsor1 = 22.5;
            $rank_sponsor1 = 7;
        }
        else if($child4 >= 81){
            $cond_match = 'chield4';
            $link_bonus_percentage_sponsor1 = 20;
            $rank_sponsor1 = 6;
        }
        else if($child3 >= 27){
            $cond_match = 'chield3';
            $link_bonus_percentage_sponsor1 = 17.5;
            $rank_sponsor1 = 5;
        }
        else if($child2 >= 9){
            $cond_match = 'chield2';
            $link_bonus_percentage_sponsor1 = 15;
            $rank_sponsor1 = 4;
        }
        else if($child1 >= 3){
            $cond_match = 'chield1';
            $link_bonus_percentage_sponsor1 = 12.5;
            $rank_sponsor1 = 3;
        }
        else{
            $frPoints = $sponsor1_data->direct_line_points + $customer_points;
            if($frPoints >= 120 && $sponsor1_data->direct_customer >= 3  && $sponsor1_data->points >= 40){
                $cond_match = 'else 1';
                $link_bonus_percentage_sponsor1 = 10;
                $rank_sponsor1 = 2;
            }
            else{
                $cond_match = 'else 2';
                $link_bonus_percentage_sponsor1 = 7.5;
                $rank_sponsor1 = 1;
            }
        }




        User::where('id',$sponsor1_data->id)->update([
            'total_points' => $total_points_sponsor1,
            'total_customers' => $total_customers_sponsor1,
            'link_bonus_percentage' => $link_bonus_percentage_sponsor1,
            'total_amount' => $total_amount_sponsor1,
            'rank' => $rank_sponsor1

        ]);


        DB::table('user_logs')->insert([
            'new_customer_id' => 0,
            'new_customer_name' => $new_customer_name,
            'sponser_id' => $sponsor1_data->id,
            'sponser_name' => $sponsor1_data->name,
            'amount' => $sponsor1_data->amount,
            'points' => $sponsor1_data->points,
            'direct_line_points' => $sponsor1_data->direct_line_points,
            'in_direct_line_points' => $sponsor1_data->in_direct_line_points,
            'total_points' => $total_points_sponsor1,
            'total_customers' => $total_customers_sponsor1,
            'direct_bonus_percentage' => $sponsor1_data->direct_bonus_percentage,
            'link_bonus_percentage' => $link_bonus_percentage_sponsor1,
            'matching_bonus_percentage' => $sponsor1_data->matching_bonus_percentage,
            'direct_amount' => $sponsor1_data->direct_amount,
            'direct_line_amount' => $sponsor1_data->direct_line_amount,
            'in_direct_line_amount' => $sponsor1_data->in_direct_line_amount,
            'matching_bonus_amount' => $sponsor1_data->matching_bonus_amount,
            'total_amount' => $total_amount_sponsor1,
            'rank' => $rank_sponsor1,
            'direct_customer' => $sponsor1_data->direct_customer,
            'cond_match' => $cond_match,
            'child1' => $child1,
            'child2' => $child2,
            'child3' => $child3,
            'child4' => $child4,
            'child5' => $child5,
            'child6' => $child6,
            'child7' => $child7,
            'child8' => $child8
        ]);


    }

    public function update_sponsor_indirect_points($sponsor_id,$customer_points,$new_customer_name){
        $sponsor1_data = User::where('id',$sponsor_id)->first();
        $in_direct_line_points_sponsor1 = $sponsor1_data->in_direct_line_points + $customer_points;
        $in_direct_line_amount_sponsor1 = (($in_direct_line_points_sponsor1 * 1000) / 100 ) * 5;
        $total_amount_sponsor1 = $sponsor1_data->direct_amount + $sponsor1_data->direct_line_amount + $in_direct_line_amount_sponsor1;

        User::where('id',$sponsor1_data->id)->update([
            'in_direct_line_points' => $in_direct_line_points_sponsor1,
            'in_direct_line_amount' => $in_direct_line_amount_sponsor1,
            'total_amount' => $total_amount_sponsor1,
        ]);

        DB::table('user_logs')->insert([
            'new_customer_id' => 0,
            'new_customer_name' => $new_customer_name,
            'sponser_id' => $sponsor1_data->id,
            'sponser_name' => $sponsor1_data->name,
            'amount' => $sponsor1_data->amount,
            'points' => $sponsor1_data->points,
            'direct_line_points' => $sponsor1_data->direct_line_points,
            'in_direct_line_points' => $in_direct_line_points_sponsor1,
            'total_points' => $sponsor1_data->total_points,
            'total_customers' => $sponsor1_data->total_customers,
            'direct_bonus_percentage' => $sponsor1_data->direct_bonus_percentage,
            'link_bonus_percentage' => $sponsor1_data->in_direct_line_points,
            'matching_bonus_percentage' => $sponsor1_data->matching_bonus_percentage,
            'direct_amount' => $sponsor1_data->direct_amount,
            'direct_line_amount' => $sponsor1_data->direct_line_amount,
            'in_direct_line_amount' => $in_direct_line_amount_sponsor1,
            'matching_bonus_amount' => $sponsor1_data->matching_bonus_amount,
            'total_amount' => $total_amount_sponsor1,
            'rank' => $sponsor1_data->rank,
            'direct_customer' => $sponsor1_data->direct_customer,
            'datetime' => date("Y-m-d H:i:s")
        ]);

    }


}
