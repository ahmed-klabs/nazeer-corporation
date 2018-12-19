<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-user','HomeController@add_user');
Route::get('/profile','HomeController@profile');

//
//Route::get('/country-create','CountriesController@create');
//Route::get('/country-edit/{id}',['as' => 'country-edit', 'uses' => 'CountriesController@edit']);
//Route::get('/country-delete/{id}',['as' => 'country-delete', 'uses' => 'CountriesController@destroy']);
//Route::post('/country-update',['as' => 'country-update', 'uses' => 'CountriesController@update']);
//Route::post('/country-store',['as' => 'country-store', 'uses' => 'CountriesController@store']);
//
//
//
//Route::get('/Civilians','CiviliansController@index');
//Route::get('/civilian-create','CiviliansController@create');
//Route::get('/civilian-edit/{id}',['as' => 'civilian-edit', 'uses' => 'CiviliansController@edit']);
//Route::get('/civilian-delete/{id}',['as' => 'civilian-delete', 'uses' => 'CiviliansController@destroy']);
//Route::post('/civilian-update',['as' => 'civilian-update', 'uses' => 'CiviliansController@update']);
//Route::post('/civilian-store',['as' => 'civilian-store', 'uses' => 'CiviliansController@store']);

