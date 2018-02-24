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

Route::get("hack/edit/{id}","HackController@edit_hack");