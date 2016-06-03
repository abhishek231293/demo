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
    return view('home');
});

Route::get('task',['as'=>'mytask'], function () {
    return view('tasks');
});

Route::get('profile', function () {
    return view('profile');
});


Route::auth();

Route::get('/', 'HomeController@index');

Route::resource('task', 'TaskController');