<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class FamilyTreeController extends Controller
{
    function index() {
//
//        $loggedinUserId = Auth::id();
//        $loggedinUserData = User::where('id', $loggedinUserId)->first();
//        $loggedinUserJoiningCode = $loggedinUserData->joining_code;
//        $loggedinUsername = $loggedinUserData->name;
//
//        $childs = User::where('sponsor_code', $loggedinUserJoiningCode)->get();
//        $grandChilds = [];
//        if(!empty($childs)) {
//            foreach ($childs as $child) {
//                $childData[] = $child;
//                $grandChild[$child['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$child->joining_code)->get();
//                if(count($grandChild[$child['name']]) > 0){
//                    array_push($grandChilds, $grandChild[$child['name']]);
//                }
//
//            }
//        }
//        else {
//            $childData = [];
//            $grandChilds = [];
//        }
//
//        $grandChildArray3 = [];
//        if(count($grandChilds) > 0) {
//            foreach ($grandChilds as $grandChild3) {
//                for ($a = 0; $a < count($grandChild3); $a++) {
//                    $code = $grandChild3[$a]['joining_code'];
//                    $child3[$grandChild3[$a]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//                    if(count($child3[$grandChild3[$a]['name']]) > 0){
//                        array_push($grandChildArray3, $child3[$grandChild3[$a]['name']]);
//                    }
//
//                }
//            }
//        }
//
//
//        $grandChildArray4 = [];
//        if(count($grandChildArray3) > 0) {
//            foreach ($grandChildArray3 as $grandChild4) {
//                for ($k = 0; $k < count($grandChild4); $k++) {
//                    $code = $grandChild4[$k]['joining_code'];
//                    $child4[$grandChild4[$k]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//                    if(count($child4[$grandChild4[$k]['name']]) > 0){
//                        array_push($grandChildArray4, $child4[$grandChild4[$k]['name']]);
//                    }
//
//                }
//            }
//        }
//
//
//        $grandChildArray5 = [];
//        if(count($grandChildArray4) > 0) {
//            foreach ($grandChildArray4 as $grandChild5) {
//                for ($l = 0; $l < count($grandChild5); $l++) {
//                    $code = $grandChild5[$l]['joining_code'];
//                    $child5[$grandChild5[$l]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//                    if(count($child5[$grandChild5[$l]['name']]) > 0){
//                        array_push($grandChildArray5, $child5[$grandChild5[$l]['name']]);
//                    }
//
//                }
//            }
//        }
//
//        $grandChildArray6 = [];
//        if(count($grandChildArray5) > 0) {
//            foreach ($grandChildArray5 as $grandChild6) {
//                for ($m = 0; $m < count($grandChild6); $m++) {
//                    $code = $grandChild6[$m]['joining_code'];
//                    $child6[$grandChild6[$m]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//                    if(count($child6[$grandChild6[$m]['name']]) > 0){
//                        array_push($grandChildArray6, $child6[$grandChild6[$m]['name']]);
//                    }
//
//                }
//            }
//        }
//
//
//
//        $grandChildArray7 = [];
//        if(count($grandChildArray6) > 0) {
//            foreach ($grandChildArray6 as $grandChild7) {
//                for ($n = 0; $n < count($grandChild7); $n++) {
//                    $code = $grandChild7[$n]['joining_code'];
//                    $child7[$grandChild7[$n]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//
//                    if(count($child7[$grandChild7[$n]['name']]) > 0){
//                        array_push($grandChildArray7, $child7[$grandChild7[$n]['name']]);
//                    }
//
//                }
//            }
//        }
//        $grandChildArray8 = [];
//        if(count($grandChildArray7) > 0) {
//            foreach ($grandChildArray7 as $grandChild8) {
//                for ($o = 0; $o < count($grandChild8); $o++) {
//                    $code = $grandChild8[$o]['joining_code'];
//                    $child8[$grandChild8[$o]['name']] = User::select('id','name', 'sponsor_code', 'joining_code')->where('sponsor_code',$code)->get();
//
//                    if(count($child8[$grandChild8[$o]['name']]) > 0){
//                        array_push($grandChildArray8, $child8[$grandChild8[$o]['name']]);
//                    }
//
//                }
//            }
//        }
//
////        print_r($grandChildArray7);
////        die();
//
//
//        //        return $grandChildArray3;
//        return view('family-tree',compact('childData', 'loggedinUsername'))->with(compact('grandChilds'))
//            ->with(compact('grandChildArray3'))->with(compact('grandChildArray4'))
//            ->with(compact('grandChildArray5'))->with(compact('grandChildArray6'))
//            ->with(compact('grandChildArray7'))->with(compact('grandChildArray8'));


        return view('family-tree');
    }

    function getData() {
        $childs = User::select('id','name', 'rank', 'sponsor_code', 'joining_code', 'filer')->get();

        $data = [];
        $i = 0;
        foreach ($childs as $child){

            $userRank = 'Sales Officer';

            if($child->rank >= 8){
                $userRank = 'General Manager';
            }
            else if($child->rank == 7){
                $userRank = 'Deputy General Manager';
            }
            else if($child->rank == 6){
                $userRank = 'Asst. General Manager';
            }
            else if($child->rank == 5){
                $userRank = 'Executive Sales Manager';
            }
            else if($child->rank == 4){
                $userRank = 'Sales Manager';
            }
            else if($child->rank == 3){
                $userRank = 'Deputy Sales Manager';
            }
            else if($child->rank == 2){
                $userRank = 'Asst. Sales Manager';
            }
            else if($child->rank == 1){
                $userRank = 'Sales Officer';
            }



            if($i == 0){
                $data[$i]['key'] = $child->joining_code;
                $data[$i]['name'] = $child->name . "\n Rank: " . $userRank;
                $data[$i]['gender'] = $child->filer;
            }
            else{
                $data[$i]['key'] = $child->joining_code;
                $data[$i]['parent'] = $child->sponsor_code;
                $data[$i]['name'] = $child->name . "\n Rank: " . $userRank;
                $data[$i]['gender'] = $child->filer;
            }
            $i++;
        }

        return json_encode($data);
    }
}
