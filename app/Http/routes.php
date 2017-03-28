<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('eventview', 'CalendarController@eventview');
Route::get('login', 'CalendarController@login');
Route::get('logout', 'CalendarController@logout');

Route::post('dologin', 'CalendarController@dologin');
  Route::group(['middleware' => 'checksession'], function () {
Route::get('admin', 'AdminController@index');
Route::get('admin/changepass', 'AdminController@changepass');
Route::post('admin/updatepass', 'AdminController@updatepass');
Route::get('admin/booking', 'AdminController@booking');
Route::get('admin/newbooking', 'AdminController@newbooking');
Route::post('admin/newbooking', 'AdminController@savebooking');
Route::get('admin/viewbooking/{id}', 'AdminController@viewbooking');
Route::get('admin/editbooking/{id}', 'AdminController@editbooking');
Route::post('admin/editbooking', 'AdminController@updatebooking');
  });
/*
Route::get('eventview', function () {
	$res=DB::table('booking')->where('Month(BookDate)',date('m'));
	print_r($res);
    return view('welcome');
});
*/
