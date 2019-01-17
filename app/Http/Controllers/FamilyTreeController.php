<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class FamilyTreeController extends Controller
{
    function index() {

        $loggedinUserId = Auth::id();
        $loggedinUserData = User::where('id', $loggedinUserId)->first();
        $loggedinUserJoiningCode = $loggedinUserData->joining_code;
        $loggedinUsername = $loggedinUserData->name;
//        return $loggedinUsername;

        $childs = User::where('sponsor_code', $loggedinUserJoiningCode)->get();


//        $childs = User::where('sponsor_code', $childs->)->get();

        if(!empty($childs)) {
            foreach ($childs as $child) {
                $childData[] = $child;
                $grandChild[$child['name']] = User::where('sponsor_code', $child->joining_code)->get();

            }
        }
        else {
            $childData = [];
            $grandChild = [];
        }

//        return $grandChild;

//        $childData['loggedinUsername'] = $loggedinUsername;
//        array_push($childData, $loggedinUsername);

        return view('family-tree',compact('childData', 'loggedinUsername'));

        return view('family-tree')->with(compact('childData'))->with(compact('loggedinUsername'))->with(compact('grandChild'));

//        return view('family-tree',compact('childData'));
    }
}
