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

    public function index(){

        $userData = Auth::User();
        $userSponserCode = $userData->joining_code;
        $userCode = $userData->joining_code;
        $userPoints = $userData->points;



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


        $totalPoints = $childsPoints + $userPoints;
        $rank = 'Sales Officer';
        if($totalPoints >= 131200){
            $rank = 'General Manager';
        }
        else if($totalPoints >= 43720){
            $rank = 'Deputy General Manager';
        }
        else if($totalPoints >= 14560){
            $rank = 'Asst. General Manager';
        }
        else if($totalPoints >= 4840){
            $rank = 'Executive Sales Manager';
        }
        else if($totalPoints >= 1600){
            $rank = 'Sales Manager';
        }
        else if($totalPoints >= 520){
            $rank = 'Deputy Sales Manager';
        }
        else if($totalPoints > 160){
            $rank = 'Asst. Sales Manager';
        }



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

    public function profile(){

        $userData = Auth::User();
        $userSponserCode = $userData->joining_code;
        $userAmount = $userData->amount;
        $userPoints = $userData->points;
        $userFilerStatus = $userData->filer;
        $dateOfCheck = date("d/m/Y", strtotime($userData->joining_date));


        $totalCustomers = 0;
        $childsAmountFirstRow = 0;
        $childsAmountSecondRow = 0;
        $childsAmount = 0;
        $childsPointsFirstRow = 0;
        $childsPointsSecondRow = 0;
        $childsPoints = 0;
        $firstChildRank = '';
        $secondChildRank = '';
        $firstChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $userSponserCode)->get();
        if(!empty($firstChilds)){

            $totalCustomers += count($firstChilds);

            foreach ($firstChilds as $firstChild){

//                $childsAmount += $firstChild->amount;
//                $childsPoints +=  $firstChild->points;

                $childsAmountFirstRow += $firstChild->amount;
                $childsPointsFirstRow +=  $firstChild->points;

                $secondChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $firstChild->joining_code)->get();
                if(!empty($secondChilds)){

                    $totalCustomers += count($secondChilds);
                    foreach ($secondChilds as $secondChild){
//                        $childsAmount += $secondChild->amount;
//                        $childsPoints +=  $secondChild->points;

                        $childsAmountSecondRow += $secondChild->amount;
                        $childsPointsSecondRow +=  $secondChild->points;

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

                            if($childsPoints == 120){
                                $secondChildRank = 'Asst. Sales Manager';
                            }

                        }

                    }

                    if($childsPointsSecondRow == 120){
                        $firstChildRank = 'Asst. Sales Manager';
                    }

                }

            }

        }


        // Matching Bonus based on monthly 3 user
        $matchingBonus = 0;
        $userDataForMatchingBonus = User::select('created_at')->where('sponsor_code', $userSponserCode)->get();
        $userCount = 0;
        foreach ($userDataForMatchingBonus as $dt){
            if(date('m-Y') == date('m-Y',strtotime($dt->created_at))){
                $userCount++;
            }

        }

        if($userCount >= 3){
            $matchingBonus = 1;
        }
        // End matcing bonus


        $totalPoints = $childsPointsFirstRow + $childsPointsSecondRow + $childsPoints + $userPoints;
        $childsPoints = $childsPointsFirstRow + $childsPointsSecondRow + $childsPoints;
        $customerPercentage = 0;
        $rank = 'Sales Officer';


        if($childsPointsFirstRow >=120){

            if($totalPoints >= 131200){
                $customerPercentage = 50;
                $rank = 'General Manager';
            }
            else if($totalPoints >= 43720){
                $customerPercentage = 45;
                $rank = 'Deputy General Manager';
            }
            else if($totalPoints >= 14560){
                $customerPercentage = 40;
                $rank = 'Asst. General Manager';
            }
            else if($totalPoints >= 4840){
                $customerPercentage = 35;
                $rank = 'Executive Sales Manager';
            }
            else if($totalPoints >= 1600){
                $customerPercentage = 30;
                $rank = 'Sales Manager';
            }
            else if($totalPoints >= 520){
                $customerPercentage = 25;
                $rank = 'Deputy Sales Manager';
            }
            else if($totalPoints >= 160 && $totalCustomers > 0){
                $customerPercentage = 20;
                $rank = 'Asst. Sales Manager';
            }
            else if($totalPoints >= 40 && $totalCustomers > 0){
                $customerPercentage = 15;
            }
            else if($totalCustomers > 0){
                $customerPercentage = 15;
            }

            $childsPointsFirstRowRank = 'Sales Officer';
            if($childsPointsFirstRow >= 160){
                $childsPointsFirstRowRank = 'Asst. Sales Manager';
            }
            else if($childsPointsFirstRow >= 40){
                $childsPointsFirstRowRank = 'Sales Officer';
            }


            if($childsPointsFirstRowRank == $rank){
                $customerPercentage = 0;
            }

        }
        else{
            $rank = 'Sales Officer';
            if($childsPointsFirstRow > 0){
                $customerPercentage = 15;
            }
        }


        if($matchingBonus > 0 && $customerPercentage >= 15){
            $firstMonthPercentage = 15;
        }
        else{
            $firstMonthPercentage = $customerPercentage;
        }


        $directBonus = 5;
        if($userPoints < 40){
            $directBonus = 0;
        }

        $totalPercentage = $customerPercentage + $directBonus + $matchingBonus;


        $amountToBePaid = 0;
        $amountToBePaidDirect = 0;
        if($directBonus > 0){
            $amountToBePaidDirect += ($userAmount / 100) * $directBonus;
        }

        $amountToBePaidFirstMonth = 0;
        if($childsAmountFirstRow > 0){

            if(($matchingBonus > 0 && $customerPercentage >= 15) || ($totalCustomers > 0)){
                $amountToBePaidFirstMonth = ($childsAmountFirstRow / 100) * 15;
            }

            $amountToBePaid += ($childsAmountFirstRow / 100) * $customerPercentage;

        }

        $amountToBePaidInDirect = 0;
        if($rank != $secondChildRank){
            if($childsPointsFirstRow >= 120 && $childsPointsSecondRow >= 40){
                $amountToBePaid += (($childsAmountSecondRow) / 100) * 5;
                $amountToBePaidInDirect = ($childsAmountSecondRow / 100) * 5;
            }

            if($childsAmount > 0){
                $amountToBePaid += ($childsAmount / 100) * 5;
                $amountToBePaidInDirect = ($childsAmount / 100) * 5;

            }
        }



        $amountToBePaidMatching = 0;
        if($matchingBonus > 0){
            $amountToBePaidMatching += ($childsAmountFirstRow / 100) * 1;
        }

        $totalAmountToBePaidFirstMonth = $amountToBePaidFirstMonth + $amountToBePaidDirect + $amountToBePaidInDirect + $amountToBePaidMatching;
        $totalAmountToBePaid = $amountToBePaid + $amountToBePaidDirect + $amountToBePaidInDirect;



        if($userFilerStatus == 'filer'){
            $filerDeductionFirstMonth = ($totalAmountToBePaidFirstMonth / 100) * 12;
            $filerDeduction = ($totalAmountToBePaid / 100) * 12;
        }
        else{
            $filerDeductionFirstMonth = ($totalAmountToBePaidFirstMonth / 100) * 15;
            $filerDeduction = ($totalAmountToBePaid / 100) * 15;
        }

        $computerFee = 150;

        $amountToBePaidAfterDeductionFirstMonth = ($totalAmountToBePaidFirstMonth - $filerDeductionFirstMonth) - $computerFee;
        $amountToBePaidAfterDeduction = ($totalAmountToBePaid - $filerDeduction) - $computerFee;



        return view('profile', compact('userData','totalCustomers','totalPoints','customerPercentage','matchingBonus','dateOfCheck','totalPercentage','rank','childsPoints','directBonus','amountToBePaid','amountToBePaidAfterDeduction','filerDeduction','computerFee','amountToBePaidDirect','totalAmountToBePaid','amountToBePaidMatching','firstMonthPercentage','totalAmountToBePaidFirstMonth','amountToBePaidFirstMonth','amountToBePaidInDirect','amountToBePaidAfterDeductionFirstMonth','filerDeductionFirstMonth'));

    }

    public function user_profile($id){

        $userData = User::find($id);
        $userSponserCode = $userData->joining_code;
        $userAmount = $userData->amount;
        $userPoints = $userData->points;
        $userFilerStatus = $userData->filer;
        $dateOfCheck = date("d/m/Y", strtotime($userData->joining_date));


        $totalCustomers = 0;
        $childsAmountFirstRow = 0;
        $childsAmountSecondRow = 0;
        $childsAmount = 0;
        $childsPointsFirstRow = 0;
        $childsPointsSecondRow = 0;
        $childsPoints = 0;
        $firstChildRank = '';
        $secondChildRank = '';
        $firstChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $userSponserCode)->get();
        if(!empty($firstChilds)){

            $totalCustomers += count($firstChilds);

            foreach ($firstChilds as $firstChild){

//                $childsAmount += $firstChild->amount;
//                $childsPoints +=  $firstChild->points;

                $childsAmountFirstRow += $firstChild->amount;
                $childsPointsFirstRow +=  $firstChild->points;

                $secondChilds = User::select('id','name','email','joining_code','points','amount')->where('sponsor_code', $firstChild->joining_code)->get();
                if(!empty($secondChilds)){

                    $totalCustomers += count($secondChilds);
                    foreach ($secondChilds as $secondChild){
//                        $childsAmount += $secondChild->amount;
//                        $childsPoints +=  $secondChild->points;

                        $childsAmountSecondRow += $secondChild->amount;
                        $childsPointsSecondRow +=  $secondChild->points;

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

                            if($childsPoints == 120){
                                $secondChildRank = 'Asst. Sales Manager';
                            }

                        }

                    }

                    if($childsPointsSecondRow == 120){
                        $firstChildRank = 'Asst. Sales Manager';
                    }

                }

            }

        }


        // Matching Bonus based on monthly 3 user
        $matchingBonus = 0;
        $userDataForMatchingBonus = User::select('created_at')->where('sponsor_code', $userSponserCode)->get();
        $userCount = 0;
        foreach ($userDataForMatchingBonus as $dt){
            if(date('m-Y') == date('m-Y',strtotime($dt->created_at))){
                $userCount++;
            }

        }

        if($userCount >= 3){
            $matchingBonus = 1;
        }
        // End matcing bonus


        $totalPoints = $childsPointsFirstRow + $childsPointsSecondRow + $childsPoints + $userPoints;
        $childsPoints = $childsPointsFirstRow + $childsPointsSecondRow + $childsPoints;
        $customerPercentage = 0;
        $rank = 'Sales Officer';


        if($childsPointsFirstRow >=120){

            if($totalPoints >= 131200){
                $customerPercentage = 50;
                $rank = 'General Manager';
            }
            else if($totalPoints >= 43720){
                $customerPercentage = 45;
                $rank = 'Deputy General Manager';
            }
            else if($totalPoints >= 14560){
                $customerPercentage = 40;
                $rank = 'Asst. General Manager';
            }
            else if($totalPoints >= 4840){
                $customerPercentage = 35;
                $rank = 'Executive Sales Manager';
            }
            else if($totalPoints >= 1600){
                $customerPercentage = 30;
                $rank = 'Sales Manager';
            }
            else if($totalPoints >= 520){
                $customerPercentage = 25;
                $rank = 'Deputy Sales Manager';
            }
            else if($totalPoints >= 160 && $totalCustomers > 0){
                $customerPercentage = 20;
                $rank = 'Asst. Sales Manager';
            }
            else if($totalPoints >= 40 && $totalCustomers > 0){
                $customerPercentage = 15;
            }
            else if($totalCustomers > 0){
                $customerPercentage = 15;
            }

            $childsPointsFirstRowRank = 'Sales Officer';
            if($childsPointsFirstRow >= 160){
                $childsPointsFirstRowRank = 'Asst. Sales Manager';
            }
            else if($childsPointsFirstRow >= 40){
                $childsPointsFirstRowRank = 'Sales Officer';
            }


            if($childsPointsFirstRowRank == $rank){
                $customerPercentage = 0;
            }

        }
        else{
            $rank = 'Sales Officer';
            if($childsPointsFirstRow > 0){
                $customerPercentage = 15;
            }
        }


        if($matchingBonus > 0 && $customerPercentage >= 15){
            $firstMonthPercentage = 15;
        }
        else{
            $firstMonthPercentage = $customerPercentage;
        }


        $directBonus = 5;
        if($userPoints < 40){
            $directBonus = 0;
        }

        $totalPercentage = $customerPercentage + $directBonus + $matchingBonus;


        $amountToBePaid = 0;
        $amountToBePaidDirect = 0;
        if($directBonus > 0){
            $amountToBePaidDirect += ($userAmount / 100) * $directBonus;
        }

        $amountToBePaidFirstMonth = 0;
        if($childsAmountFirstRow > 0){

            if(($matchingBonus > 0 && $customerPercentage >= 15) || ($totalCustomers > 0)){
                $amountToBePaidFirstMonth = ($childsAmountFirstRow / 100) * 15;
            }

            $amountToBePaid += ($childsAmountFirstRow / 100) * $customerPercentage;

        }

        $amountToBePaidInDirect = 0;
        if($rank != $secondChildRank){
            if($childsPointsFirstRow >= 120 && $childsPointsSecondRow >= 40){
                $amountToBePaid += (($childsAmountSecondRow) / 100) * 5;
                $amountToBePaidInDirect = ($childsAmountSecondRow / 100) * 5;
            }

            if($childsAmount > 0){
                $amountToBePaid += ($childsAmount / 100) * 5;
                $amountToBePaidInDirect = ($childsAmount / 100) * 5;

            }
        }



        $amountToBePaidMatching = 0;
        if($matchingBonus > 0){
            $amountToBePaidMatching += ($childsAmountFirstRow / 100) * 1;
        }

        $totalAmountToBePaidFirstMonth = $amountToBePaidFirstMonth + $amountToBePaidDirect + $amountToBePaidInDirect + $amountToBePaidMatching;
        $totalAmountToBePaid = $amountToBePaid + $amountToBePaidDirect + $amountToBePaidInDirect;



        if($userFilerStatus == 'filer'){
            $filerDeductionFirstMonth = ($totalAmountToBePaidFirstMonth / 100) * 12;
            $filerDeduction = ($totalAmountToBePaid / 100) * 12;
        }
        else{
            $filerDeductionFirstMonth = ($totalAmountToBePaidFirstMonth / 100) * 15;
            $filerDeduction = ($totalAmountToBePaid / 100) * 15;
        }

        $computerFee = 150;

        $amountToBePaidAfterDeductionFirstMonth = ($totalAmountToBePaidFirstMonth - $filerDeductionFirstMonth) - $computerFee;
        $amountToBePaidAfterDeduction = ($totalAmountToBePaid - $filerDeduction) - $computerFee;



        return view('profile', compact('userData','totalCustomers','totalPoints','customerPercentage','matchingBonus','dateOfCheck','totalPercentage','rank','childsPoints','directBonus','amountToBePaid','amountToBePaidAfterDeduction','filerDeduction','computerFee','amountToBePaidDirect','totalAmountToBePaid','amountToBePaidMatching','firstMonthPercentage','totalAmountToBePaidFirstMonth','amountToBePaidFirstMonth','amountToBePaidInDirect','amountToBePaidAfterDeductionFirstMonth','filerDeductionFirstMonth'));

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
//            return redirect('/add-user');
            $message = "Monthly Limit reached!!";
            return redirect('/add-user')->withErrors($message);
        }
        else{
            $userLastId = User::select('id')->orderBy('id', 'desc')->first();
//            $email = "0000" . strval($userLastId->id + 1) . "@nazeer-corporation.com";

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

            $user->save();
            return redirect('/home');
        }


    }

}
