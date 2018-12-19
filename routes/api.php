<?php

use Illuminate\Http\Request;
use App\Civilians;
use App\Countries;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('civilian/country/{id}', function($id) {
    return Civilians::where('company_id',$id)->get();
});