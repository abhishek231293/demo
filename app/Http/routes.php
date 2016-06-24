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

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});

Route::get('/', 'HomeController@index');
Route::post('create', 'HomeController@create');
Route::get('gallery','HomeController@galleryData');
Route::post('gallery/image','HomeController@gallerySelectedData');
Route::post('gallery/add','HomeController@galleryAddImage');


Route::auth();

Route::resource('task', 'TaskController');

Route::get('profile/{id}', 'ProfileController@index');
Route::get('profile/{id}/password', 'ProfileController@changePassword');
Route::post('profile/{id}/reset', 'ProfileController@resetPassword');
