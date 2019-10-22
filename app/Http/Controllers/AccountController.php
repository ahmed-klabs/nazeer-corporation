<?php

namespace App\Http\Controllers;

use App\Account;
use App\BonusDetail;
use App\MonthlyChecquesLogs;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('user')->orderBy('id', 'desc')->get();
//        dd($accounts);
        return view('accounts/index', compact('accounts'));
    }


    public function show($id)
    {
        $accounts = Account::where('user_id', $id)->with('user')->orderBy('id', 'desc')->get();

        return view('accounts/show', compact('accounts'));
    }

    public function storeInvoice(Request $request)
    {
        if($request->user && $request->amount){

            $date = $request->date;
            $date = date('Y-m-d 00:00:00', strtotime($date));


            $now = Carbon::now();
            $year = $now->year;
            $month = $now->month;

            Account::insert([
                "user_id" => $request->user,
                "amount" => $request->amount,
                "type" => $request->type,
                "date" => $request->date,
                "month" => $month,
                "year" => $year,
                "detail" => "Cheque ".$month."-".$year." Invoice",
                "created_at" => $date,
                "updated_at" => $date,
            ]);

            return redirect('/user/'.$request->user);


        }
    }

    public function refresh()
    {
        Account::where('type', 'CREDIT')->delete();
        BonusDetail::where('user_id', '!=', 0)->delete();
        MonthlyChecquesLogs::where('id', '!=', 0)->delete();

        return redirect('/accounts');
    }
    public function invoice(){
        $users = User::where('role', 'user')
            // ->where('amount', '<', 40000)
            ->get();

        return view('invoice.index', compact('users'));
    }
    public function closing()
    {
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;


        if(MonthlyChecquesLogs::where('month', $month)->where('year', $year)->count()){
            return redirect('/accounts');
        }else{
            // add record in accounts
            $users = User::where('role', '!=', 'admin')->where('role', '!=', 'operator')->get();
            // $users = User::where('id', 69)->get();
            
            foreach($users as $user){
                $userId = $user->id;

                $totalAmount = 0;
                echo 'User :'.$user->name.' <br>';
                echo "user id: ".$userId."<br>";
                echo '<pre>';
                // Direct bonus work
                $directBonus = 0;
                if($user->points >= 40){

                    $directBonus = ($user->amount/100)*5;
                }

                echo 'Points : '.$user->points."<br>";
                echo 'Direct Bonus : '.(($user->amount/100)*5)."<br>";

                // link bonus work
                $joiningCode = $user->joining_code;
                $sponsorCode = $user->sponsor_code;
                $linkBonus = 0;

                $isChlid = User::where('sponsor_code', $joiningCode)->count();
                $isChildAmount = User::where('sponsor_code', $joiningCode)->sum('amount');                
                
                echo 'Childs : '.$isChlid."<br>";
                
                if($isChlid){

                    if($user->points >= 40 && $user->points < 161){
                        echo '7.5'."<br>";
                        $linkBonus = ($isChildAmount/100)*7.5;

                    }elseif($user->points >= 161 && $user->points < 521){
                        echo '10'."<br>";
                        $linkBonus = ($isChildAmount/100)*7.5;

                    }elseif($user->points >= 521 && $user->points < 1601){
                        echo '12.5'."<br>";
                        $linkBonus = ($isChildAmount/100)*10;

                    }elseif($user->points >= 1601 && $user->points < 4841){
                        echo '15'."<br>";
                        $linkBonus = ($isChildAmount/100)*12.5;

                    }elseif($user->points >= 4841 && $user->points < 14561){
                        echo '17.5'."<br>";
                        $linkBonus = ($isChildAmount/100)*15;

                    }elseif($user->points >= 14561 && $user->points < 43721){
                        echo '20'."<br>";
                        $linkBonus = ($isChildAmount/100)*17.5;

                    }elseif($user->points >= 43721 && $user->points <= 131201){
                        echo '22.5'."<br>";
                        $linkBonus = ($isChildAmount/100)*20;

                    }elseif($user->points > 131201){
                        echo '22.5'."<br>";
                        $linkBonus = ($isChildAmount/100)*22.5;

                    }
                }
                echo 'Link Bonus: '.$linkBonus."<br>";
                echo 'Total Amount: '.($directBonus+$linkBonus)."<br>";
            //    exit;
                // Matching bonus work

                $matchingBonus = 0;
                if($isChlid == 3){
                    $childs = User::where('sponsor_code', $joiningCode)
                        ->whereRaw('MONTH(created_at) = ?',[$user->created_at->format('m')])->count();

                    if($childs == 03){
                        $matchingBonus = ($isChildAmount/100)*1;
                    }
                }

                echo 'Matching Bonus is : '.$matchingBonus.'<br>';
                echo 'Sponser code : '.$joiningCode.'<br>';

                // In-direct bonus work
                $indirectBonus = $user->in_direct_bonus;

                $totalAmount = $directBonus + $linkBonus + $matchingBonus + $indirectBonus;
                $tax = 17;
                if($user->filer == "filer"){
                    $tax = 12;
                }

                $taxAmount = ($totalAmount /100) * $tax;
                BonusDetail::insert([
                    "user_id" => $user->id,
                    "direct_bonus" => $directBonus,
                    "link_bonus" => $linkBonus,
                    "matching_bonus" => $matchingBonus,
                    "indirect_bonus" => $indirectBonus,
                    "amount" => $totalAmount,
                    "tax" => $taxAmount,
                    "total_amount" => $totalAmount-$taxAmount -150,
                    "month" => $month,
                    "year" => $year,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]);



                // filer -> 12%, nonfile -> 17%, 150 computer fee
                Account::insert([
                    "user_id" => $user->id,
                    "amount" => $totalAmount-$taxAmount-150,
                    "type" => "CREDIT",
                    "detail" => "Cheque ".$month."-".$year." Invoice",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ]);
                echo '<br><br><br><br><br>';
            }
            MonthlyChecquesLogs::insert([
                "month" => $month,
                "year" => $year,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }

//        exit;

        return redirect('/accounts');
    }
}
