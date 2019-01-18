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

        $childs = User::where('sponsor_code', $loggedinUserJoiningCode)->get();
        $grandChilds = [];
        if(!empty($childs)) {
            foreach ($childs as $child) {
                $childData[] = $child;
                $grandChild[$child['name']] = User::select('id','name', 'sponsor_code')->where('sponsor_code',$child->joining_code)->get();
                array_push($grandChilds, $grandChild[$child['name']]);
            }
        }
        else {
            $childData = [];
            $grandChilds = [];
        }


        return $grandChilds ;
        return view('family-tree',compact('childData', 'loggedinUsername'))->with(compact('grandChilds'));
    }
}
