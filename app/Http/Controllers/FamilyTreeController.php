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
                $grandChild[$child['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$child->joining_code)->get();
                array_push($grandChilds, $grandChild[$child['name']]);
            }
        }
        else {
            $childData = [];
            $grandChilds = [];
        }

        $grandChildArray3 = [];
        if(count($grandChilds) > 0) {
            foreach ($grandChilds as $grandChild3) {
                for ($i = 0; $i < count($grandChild3); $i++) {
                    $child3[$grandChild3[$i]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$grandChild3[$i]->joining_code)->get();

                    array_push($grandChildArray3, $child3[$grandChild3[$i]['name']]);
                }
            }
        }
//        return $grandChildArray3;
        return view('family-tree',compact('childData', 'loggedinUsername'))->with(compact('grandChilds'))->with(compact('grandChildArray3'));
    }
}
