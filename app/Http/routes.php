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
return phpinfo();
    return view('welcome');
});

Route::get("notify","FirebaseController@notify");
Route::post("notify","FirebaseController@post_notify");

Route::group(["prefix"=>"hack"],function(){
	Route::get("edit/{id}","HackController@edit_hack");
	Route::get("add","HackController@add_hack");
	Route::get("reports","HackController@reported_hack");
	Route::get("report/view/{hack_id}","HackController@hack_report_view");
	Route::get("special","HackController@special_hack");
	Route::get("ownership/{type}","HackController@ownership_hack");
	Route::get("resolve/{type}","HackController@resolve_hack");

});
Route::group(["prefix"=>"tag"],function(){
	Route::get("new","HackController@new_tag");
	Route::post("new","HackController@save_tag");
	Route::get("list","HackController@tag_list");
});
