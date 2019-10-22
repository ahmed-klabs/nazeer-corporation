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

Route::get('/updateapp', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard');


Route::get('/users','HomeController@users');
Route::get('/user_dashboard/{id}', 'HomeController@user_dashboard');
Route::get('/add-user','HomeController@add_user');
Route::post('/add-user','HomeController@create_user');
Route::get('/profile','HomeController@profile');
Route::get('/user/{id}','HomeController@user_profile');
Route::get('/user/{id}/edit','HomeController@userEdit');
Route::post('/user/edit','HomeController@userUpdate');
Route::get('/user/{id}/cheque-paid','HomeController@chequePaid');
Route::post('/invite-user', 'InviteUserController@usersHierarchy')->name('home');
Route::get('/hierarchy', 'FamilyTreeController@index');
Route::get('/roots_data', 'FamilyTreeController@getData');

// Sponsor code validation Route
Route::post('/checkChild', 'HomeController@checkChild');

Route::post('/password-reset', 'ForgotPassword@changePassword');


Route::get('/accounts', 'AccountController@index');
Route::get('/accounts/user/{id}', 'AccountController@show');

Route::get('/invoice', 'AccountController@invoice');
Route::post('/invoice', 'AccountController@storeInvoice');