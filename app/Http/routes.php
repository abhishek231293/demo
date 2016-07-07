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
Route::post('gallery/filterData','HomeController@filterData');
Route::post('gallery/image','HomeController@gallerySelectedData');
Route::post('gallery/add','HomeController@galleryAddImage');
Route::post('gallery/categoryAdd','HomeController@galleryAddCategory');

Route::auth();


Route::resource('task', 'TaskController');


Route::get('profile/{id}', ['middleware' => 'profile', 'uses'=>'ProfileController@index']);

Route::get('profile/{id}/password', ['middleware' => 'profile', 'uses'=>'ProfileController@changePassword']);
Route::post('profile/{id}/reset', 'ProfileController@resetPassword');
Route::post('profile/{id}/updateUser','ProfileController@updateUser');

Route::get('map','MapController@index');