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
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/user_dashboard/{id}', 'HomeController@user_dashboard');
Route::get('/add-user','HomeController@add_user');
Route::post('/add-user','HomeController@create_user');
Route::get('/profile','HomeController@profile');
Route::get('/user/{id}','HomeController@user_profile');
Route::post('/invite-user', 'InviteUserController@usersHierarchy')->name('home');
Route::get('/hierarchy', 'FamilyTreeController@index');
Route::get('/roots_data', 'FamilyTreeController@getData');

// Sponsor code validation Route
Route::post('/checkChild', 'HomeController@checkChild');

Route::post('/password-reset', 'ForgotPassword@changePassword');
