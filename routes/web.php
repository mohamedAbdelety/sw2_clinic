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
    return view('welcome');
})->middleware('frontendmaintance');

Route::get('/frontendmaintance', function () {
 return view('frontendmaintance');
});

// for staff 
Route::get('/dashboard/login',function(){
	return view('dashboard.login');
})->middleware('goDashIfLogin');// must visitor

Route::get('/dashboard/logout','staff@logout');
Route::Post('/dashboard/login','staff@login_post');

// for all staff
Route::get('/lang/{lang}',function($lang){
	$staff = App\User::where('id',auth()->user()->id)->first();
	$staff->update(['lang'=> $lang]);
	return back();
})->middleware('IsStaff');

Route::get('/dashboard/maintance',function(){
	return view('dashboard.maintance');
});




	
