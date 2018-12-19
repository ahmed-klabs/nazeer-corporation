<?php

namespace App\Http\Controllers;


use Session;
use App\Civilians;
use App\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CiviliansController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $civilians = iterator_to_array(Civilians::select('countries.name','civilians.id','civilians.first_name','civilians.last_name','civilians.company_id','civilians.email','civilians.phone')->join('countries', 'civilians.company_id', '=', 'countries.id')->get());
        return view('civilians/index',["data" => $civilians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = iterator_to_array(Countries::select('id','name')->get());
        return view('civilians/create', ["countries" => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {

            Session::flash('error', $validator->messages()->first());
            return redirect('civilian-create')->withErrors($validator)->withInput();

        }
        $civilian=new \App\Civilians;
        $civilian->first_name=$request->get('first_name');
        $civilian->last_name=$request->get('last_name');
        $civilian->email=$request->get('email');
        $civilian->phone=$request->get('phone');
        $civilian->company_id=$request->get('country');
        $civilian->save();

        Session::flash('create', 'Information Submitted Successfully!');
        return redirect('Civilians');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Civilians::where('id',$id)->get();
        return view('civilians/edit', ["data" => $detail[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {

            Session::flash('error', $validator->messages()->first());
            return redirect('civilian-create')->withErrors($validator)->withInput();

        }
        $civilian= Civilians::find($data['id']);
        $civilian->first_name=$request->get('first_name');
        $civilian->last_name=$request->get('last_name');
        $civilian->email=$request->get('email');
        $civilian->phone=$request->get('phone');
        $civilian->save();

        Session::flash('update', 'Information Updated Successfully!');
        return redirect('Civilians');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $civilian = Civilians::find($id);
        $civilian->delete();
        Session::flash('delete','Information has been deleted');
        return redirect('Civilians');
    }
}
