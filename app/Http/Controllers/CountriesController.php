<?php

namespace App\Http\Controllers;

use App\Countries;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries = iterator_to_array(Countries::orderBy('id', 'DESC')->get());
        return view('countries/index',["data" => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries/create');
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
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'website' => 'required|string|max:100'
        ]);
        if ($validator->fails()) {

            Session::flash('error', $validator->messages()->first());
            return redirect('country-create')->withErrors($validator)->withInput();

        }
        $path ='';
        if($request->hasfile('logo'))
        {
            $file = $request->file('logo');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $path = public_path().'/images/'. $name;
        }

        $company= new \App\Countries;
        $company->name=$request->get('name');
        $company->email=$request->get('email');
        $company->website=$request->get('website');
        $company->logo=$path;
        $company->save();

        return redirect('Countries');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Countries::where('id',$id)->get();
        return view('countries/edit', ["data" => $detail[0]]);
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
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'website' => 'required|string|max:100'
        ]);
        if ($validator->fails()) {

            Session::flash('error', $validator->messages()->first());
            return redirect('country-create')->withErrors($validator)->withInput();

        }
        $path ='';
        if($request->hasfile('logo'))
        {

            $file = $request->file('logo');

            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $path = public_path().'/images/'. $name;
        }
        $company= Countries::find($data['id']);
        $company->name=$request->get('name');
        $company->email=$request->get('email');
        $company->website=$request->get('website');
        $company->logo=$path;
        $company->save();

        return redirect('Countries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Countries::find($id);
        $country->delete();
        Session::flash('success','Information has been  deleted');
        return redirect('Countries');
    }
}
